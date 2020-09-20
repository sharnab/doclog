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
        <div class="portlet-body" style="border: 1px solid black">
        <div class="invoice" >
            <div>
                <div class="row invoice-logo">
                    <div class="col-xs-3 invoice-logo-space">
                        <img src="../../../template/metronic/assets/admin/layout4/img/iata-logo.png" class="img-responsive" alt="company logo" style="height:105px;"/>
                    </div>
                    <div class="col-xs-6 invoice-logo-space">
                        <p style="margin: 30px 0 0; font-size: 30px; font-weight: bold; text-align: center">
                            Desposite Slip
                        </p>
                    </div>
                    <div class="col-xs-3 invoice-logo-space">
                        <img src="../../../template/metronic/assets/admin/layout4/img/scb.jpg" class="img-responsive" alt="company logo" style="height:80px; padding-left: 20%; margin-top: 4%; padding-top: 4%"/>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-9">&nbsp;</div>
                        <div class="col-xs-3">
                            <table>
                                <tr>
                                    <td>Deposite Slip No.</td>
                                    <td style="border: 1px solid black; padding-right: 85px">&nbsp;</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="col-xs-10">
                            ENCLOSED PLEASE FIND THE FOLLOWING CHEQUES / CASH TO BE CREDITED TO THE ACCOUNT MENTIONED BELOW
                        </div>
                        <div class="col-xs-2">&nbsp;</div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table id="main_table" style="width: 100%; border-top: 1px solid grey;">
                        <tr>
                            <td style="padding-bottom: 10px; vertical-align: top; font-weight: 600; width: 7%" colspan='2'>
                                Account Holder<span style="padding-left: 25%">:</span>
                            </td>
                            <td style="padding-bottom: 10px; padding-left: 15px; font-weight: 600" colspan='3'>
                                INTERNATIONAL AIR TRANSPORT ASSOCIATION - BSP HINGE ACCOUNT
                            </td>
                            <td style="text-align: center; padding-bottom: 10px; padding-left: 15px; font-weight: 600; border: 1px solid black; width: 10%;" colspan='2'>
                                Date
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 10px; vertical-align: top; font-weight: 600; width: 8%" colspan='2'>
                                Account Number<span style="padding-left: 19%">:</span>
                            </td>
                            <td style="padding-bottom: 10px; padding-left: 15px; width: 30%" colspan='3'>
                                <span style="border: 1px solid black; padding: 5px; padding-right: 20%;padding-left: 10px">77029</span>
                            </td>
                            <td style="padding-bottom: 10px; padding-left: 15px; font-weight: 600; border: 1px solid black; width: 10%;" colspan='2'>
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 10px; vertical-align: top; font-weight: 600; width: 8%" colspan='2'>
                                Agent Name<span style="padding-left: 36%">:</span>
                            </td>
                            <td style="padding-bottom: 10px; padding-left: 15px;" colspan='5'>
                                <span style="padding: 5px">..............................</span>
                            </td>
                        </tr>
                    </table>
                </div>
                <div class="col-xs-12">
                    <table id="main_table" style="width: 100%; border: 1px solid grey; border-left: 0px; border-right: 0px;">
                        <tr>
                            <td style="text-align: center; border: 1px solid black; border-left: 0px; border-top: 0px;">
                                Sl. No.
                            </td>
                            <td style="text-align: center; border: 1px solid black; border-top: 0px; width: 18%" colspan="2">
                                Drawee Bank/Branch
                            </td>
                            <td style="text-align: center; border: 1px solid black; width: 12%; border-top: 0px;">
                                Instrument No.
                            </td>
                            <td style="text-align: center; border: 1px solid black; width: 8%; border-top: 0px;">
                                Date
                            </td>
                            <td style="text-align: center; border: 1px solid black; border-right: 0px; width: 10%; border-top: 0px;" colspan="2">
                                Amount
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 5%; border-left: 0px; text-align: center; border: 1px solid black; width: 5%">&nbsp;</td>
                            <td style="padding-bottom: 5%; text-align: center; border: 1px solid black; width: 18%" colspan="2">&nbsp;</td>
                            <td style="padding-bottom: 5%; text-align: center; border: 1px solid black; width: 12%">&nbsp;</td>
                            <td style="padding-bottom: 5%; text-align: center; border: 1px solid black; width: 8%">&nbsp;</td>
                            <td style="padding-bottom: 5%; text-align: center; border: 1px solid black; width: 10%">&nbsp;</td>
                            <td style="padding-bottom: 5%; text-align: center; border: 1px solid black; border-right: 0px; width: 3%">&nbsp;</td>
                        </tr>
                        <tr>
                            <td style="text-align: center; border: 0px; width: 5%">&nbsp;</td>
                            <td style="text-align: center; border: 0px; width: 18%" colspan="2">&nbsp;</td>
                            <td style="text-align: center; border: 0px; width: 12%">&nbsp;</td>
                            <td style="text-align: center; border: 1px solid black; width: 8%; font-weight: 700; text-align: right">Total Amount =</td>
                            <td style="text-align: center; border: 1px solid black; width: 10%">&nbsp;</td>
                            <td style="text-align: center; border: 1px solid black; border-right: 0px;width: 3%">&nbsp;</td>
                        </tr>
                    </table>
                    <table id="main_table" style="width: 100%; border-bottom: 1px solid grey">
                        <tr>
                            <td style="font-weight: 700">
                                Amount in Words BDT
                            </td>
                            <td>
                                .....................
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Depositor's Name
                            </td>
                            <td>
                                .....................
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Depositor's Address
                            </td>
                            <td>
                                .....................
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Depositor's Phone No
                            </td>
                            <td>
                                .....................
                            </td>
                            <td>
                                Photo ID No
                            </td>
                            <td>
                                .....................
                            </td>
                            <td>
                                Source of Fund
                            </td>
                            <td>
                                .....................
                            </td>
                        </tr>
                        <tr>
                            <td style="font-weight: 700; padding-top: 3%">
                                Bank's Acknowledgement
                            </td>
                            <td colspan='2' style="padding-top: 3%">
                                .....................
                            </td>
                            <td style="font-weight: 700; padding-top: 3%">
                                Depositor's Signature
                            </td>
                            <td colspan='2' style="padding-top: 3%">
                                .....................
                            </td>
                        </tr>
                    </table>

                    <div class="col-xs-12" >
                        Presentation/collection of cheques shall be governed by the bank's General Business Conditions and made at the customer's risk, and the bank shall not be responsible for any loss due to requirements of foreign laws and any event beyond the bank's control (including acts of the bank's correspondents and any invalidity of any cheque or any signature thereon). The customer shall indemnify the bank against any loss or claim suffered by the bank in relation to any cheque (including any claim for refund or cheque proceeds on the groune of forgery/alteration relating to the cheque) Out station cheque, Out station cheque, postdated cheques, multiple cheques shall not be accepted.
                    </div>
                    <div class="col-xs-8" style="text-align: right">&nbsp;</div>
                    <div class="col-xs-4" style="font-size: 9px; padding-left: 9%; padding-right: 0px; padding-top: 5px;">
                        White - Standard Chartered Bank Copy<br />
                        Green - Branch Copy<br />
                        Pink - Branch Copy
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
