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
                        <p style="margin: 10px 0 0; font-size: 15px;">
                            <b>Fly Hopper (Pvt) Ltd</b>
                        </p>
                        <p style="margin: 0">
                            Graps Market, Plot-8, Madani Avenue,
                        </p>
                        <p style="margin: 0">
                            Block-J, Baridhara, Dhaka-1212
                        </p>
                        <p style="margin: 0">
                            Phone: +88 01733 380 500
                        </p>
                        <p style="margin: 0">
                            Email:sales@graspbd.com
                        </p>
                        <p style="margin: 0">
                            SMS:
                        </p>
                        <p>
                            Web:www.graspbd.com
                        </p>
                        <p style="margin: 0">
                            Autometic Receipt No:
                        </p>
                        <p>
                            Manual Receipt No:
                        </p>
                    </div>

                    <div class="col-xs-4 col-xs-offset-2" style="padding-left: 18%">
                        <img src="../../../template/metronic/assets/admin/layout4/img/logo-ams.png" class="img-responsive" alt="company logo" style="height:100px"/>
                    </div>
                </div>
            </div>

            <hr/>
            <div class="row">
                <div class="col-xs-9" style="padding-left: 40%">
                    <table border="1">
                        <tr>
                            <td style="padding: 5px 20px 5px 20px; font-size: 15px">
                                <b>Money Receipt</b>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-3 invoice-payment" style="padding-left: 5%">
                    <table>
                        <tr class="bordered-tr">
                            <td style="border-right: 1px solid black; font-size: 15px"><b>Date :</b></td>
                            <td class="table-data bordered-td" style="text-align: center; border: 1px solid black; font-size: 15px">27</td>
                            <td class="table-data bordered-td" style="text-align: center; border: 1px solid black; font-size: 15px">05</td>
                            <td class="table-data bordered-td" style="text-align: center; border: 1px solid black; font-size: 15px">1999</td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-12" style="padding-top: 20px;">
                    <table border="1" width=100%>
                        <tr>
                            <td colspan="1" style="border: 0px solid black;">Received with thanks from</td>
                            <td colspan="5" style="border: 0px solid black; border-bottom: 1px dotted black;"></td>
                        </tr>
                        <tr>
                            <td colspan="1" style="border: 0px solid black;">The sum of taka in words</td>
                            <td colspan="5" style="border: 0px solid black; border-bottom: 1px dotted black;"></td>
                        </tr>
                        <tr>
                            <td colspan="1" style="border: 0px solid black;">being the payment against</td>
                            <td colspan="5" style="border: 0px solid black; border-bottom: 1px dotted black;"></td>
                        </tr>
                        <tr>
                            <td style="border: 0px solid black; padding-top: 20px">Dated</td>
                            <td style="border: 0px solid black; padding-top: 20px">..............................</td>
                            <td style="border: 0px solid black; padding-top: 20px">On</td>
                            <td style="border: 0px solid black; padding-top: 20px">..............................</td>
                            <td style="border: 0px solid black; padding-top: 20px">Bank/Credit Card/Mobile Payment</td>
                            <td style="border: 0px solid black; padding-top: 20px">..............................</td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-8 invoice-payment" style="padding: 4% 0 0 2%;">
                    <table>
                        <tr class="bordered-tr">
                            <td style="font-size: 15px"><b>Amount of Taka</b></td>
                            <td class="table-data bordered-td" style="padding-left: 10px; padding-right: 40px; border: 1px solid black; font-size: 15px">3000</td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-4 invoice-payment" style="padding: 4% 0 0 15%;">
                    <table>
                        <tr class="bordered-tr">
                            <td class="table-data bordered-td" style="padding-top: 10px;">&nbsp;</td>
                            <td class="table-data bordered-td" style="font-size: 15px; padding: 0px; border-top: 1px dotted black">Received By</td>
                        </tr>
                    </table>
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
