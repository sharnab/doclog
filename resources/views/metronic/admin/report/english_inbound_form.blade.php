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
            <div class="row">
                <div class="col-xs-12">
                    <div class="col-xs-12" style="font-size: 18px; font-weight: 700; text-align: center">Government of the People Republic of Bangladesh</div>
                    <div class="col-xs-12" style="font-size: 14px; text-align: center">Schedule - 1</div>
                    <div class="col-xs-12" style="font-size: 14px; text-align: center">[See Rule 3(4), 8(1),8(2) & Rule 4(3)]</div>
                    <div class="col-xs-12" style="font-size: 14px; text-align: center">(Baggage Declaration Form)</div>
                    <div class="col-xs-12" style="font-size: 14px; text-align: center">(Please tick mark where applicable)</div>
                    <div class="col-xs-12">&nbsp;</div>

                    <div class="col-xs-12">
                        <table border='0' style="width: 100%">
                            <tr>
                                <td style="width: 30%; padding-left: 5px">1. Name of the Passenger</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; padding-left: 5px">2. Passport Number</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; padding-left: 5px">3. Flight No.& Date</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; padding-left: 5px">4. Nationality</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width: 30%; padding-left: 5px">5. Country Where you have travelled for the last three months: Name of the country</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width: 30%; padding-left: 5px; text-align: center">Name of the country</td>
                                <td style="width: 80%; padding-left: 5px; text-align: center">Travel Date</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width: 30%; padding-left: 5px; text-align: center">(a) __________________________</td>
                                <td colspan="2" style="width: 30%; padding-left: 5px; text-align: center">__________________________</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width: 30%; padding-left: 5px; text-align: center">(b) __________________________</td>
                                <td colspan="2" style="width: 30%; padding-left: 5px; text-align: center">__________________________</td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width: 30%; padding-left: 5px; text-align: center">(c) __________________________</td>
                                <td colspan="2" style="width: 30%; padding-left: 5px; text-align: center">__________________________</td>
                            </tr>
                            <tr>
                                <td colspan='3' style="width: 30%; padding-left: 5px"><u>6. Please read the questions attentively and answer:</u></td>
                            </tr>
                        </table>
                        <table border='0' style="width: 100%">
                            <tr>
                                <td colspan="2" style="width: 50%; padding-left: 5%; border-top: 1px solid black; border-right: 1px solid black">
                                    (a) Do you have any goods which are dutiable as described on Attached Schedule-2?<br />
                                    [N.B.: If any, please contact Customs Officer on duty, for paying duties and taxes]
                                </td>
                                <td style="padding-left: 5%; vertical-align: top; border-top: 1px solid black">
                                    <table>
                                        <tr>
                                            <td>Answer:</td>
                                            <td>Yes</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                            <td>No</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width: 30%; padding-left: 5%; border-right: 1px solid black; padding-top: 0px; padding-bottom: 0px">
                                    (i) Prohi Bited Articles
                                </td>
                                <td style="padding-left: 5%; vertical-align: top; padding-top: 0px; padding-bottom: 5px">
                                    <table>
                                        <tr>
                                            <td>Answer:</td>
                                            <td>Yes</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                            <td>No</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width: 30%; padding-left: 5%; border-right: 1px solid black; padding-top: 0px; padding-bottom: 0px; vertical-align: top">
                                    (ii) Silver/Gold Jewellery (over free alowance)
                                </td>
                                <td style="padding-left: 5%; vertical-align: top; padding-top: 0px; padding-bottom: 5px; vertical-align: top">
                                    <table>
                                        <tr>
                                            <td>Answer:</td>
                                            <td>Yes</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                            <td>No</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2" style="width: 30%; padding-left: 5%; border-right: 1px solid black; padding-top: 0px; padding-bottom: 0px; vertical-align: top">
                                    (iii) Gold/Silver Bar or Bullton
                                </td>
                                <td style="padding-left: 5%; vertical-align: top; padding-top: 0px; padding-bottom: 5px; vertical-align: top">
                                    <table>
                                        <tr>
                                            <td>Answer:</td>
                                            <td>Yes</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                            <td>No</td>
                                            <td style="border: 1px solid black; width: 20%"></td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>

                                <tr>
                                    <td colspan="2" style="width: 30%; padding-left: 5%; border-right: 1px solid black">
                                        (b) Do you have foreign currence more than Answer: US$ 5,000/- or equivalent in any other
                                        foreign currency? <br />
                                        [N.B.: If you possess foreign currency more than stated above, please contact Customs Officer on duty to declare the currency in
                                        FMJ Form]
                                    </td>
                                    <td style="padding-left: 5%; vertical-align: top;">
                                        <table>
                                            <tr>
                                                <td>Answer:</td>
                                                <td>Yes</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                                <td>No</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 30%; padding-left: 5%; border-top: 1px solid black; border-right: 1px solid black">
                                        (c) Do you have any unaccompanied baggage?<br />
                                        [N.B.: Airways Bill/Bill of lading no.& date, If any]
                                    </td>
                                    <td style="padding-left: 5%; vertical-align: top; border-top: 1px solid black">
                                        <table>
                                            <tr>
                                                <td>Answer:</td>
                                                <td>Yes</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                                <td>No</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 30%; padding-left: 5%; border-right: 1px solid black">
                                        (d) Meat & Meat Products/Dairy Products/Fish/Poultry Products
                                    </td>
                                    <td style="padding-left: 5%; vertical-align: top;">
                                        <table>
                                            <tr>
                                                <td>Answer:</td>
                                                <td>Yes</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                                <td>No</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 30%; padding-left: 5%; border-right: 1px solid black">
                                        (e) Seeds/Plants/Fruits/Flowers/other Planting material
                                    </td>
                                    <td style="padding-left: 5%; vertical-align: top;">
                                        <table>
                                            <tr>
                                                <td>Answer:</td>
                                                <td>Yes</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                                <td>No</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="width: 30%; padding-left: 5%; border-right: 1px solid black; border-bottom: 1px solid black">
                                        (f) Over 02 (two) cellular phone
                                    </td>
                                    <td style="padding-left: 5%; vertical-align: top; border-bottom: 1px solid black">
                                        <table>
                                            <tr>
                                                <td>Answer:</td>
                                                <td>Yes</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                                <td>No</td>
                                                <td style="border: 1px solid black; width: 20%"></td>
                                            </tr>
                                        </table>
                                    </td>
                                </tr>
                            </tr>
                        </table>
                        <table border='0' style="width: 100%">
                            <tr>
                                <td style="width: 30%; padding-left: 5px">7. Number of Baggage</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                            </tr>
                            <tr>
                                <td style="width: 30%; padding-left: 5px">8. Country from where coming</td>
                                <td style="padding-left: 5px; width: 1%">:</td>
                                <td style="width: 80%; border-bottom: 1px dotted black">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="3" style="width: 30%; padding-left: 5px">
                                    Please report to customs officer at the Red Channel counter in case answer to any of the above questions are 'yes'.
                                </td>
                            </tr>
                        </table>
                    </div>

                    <div class="col-xs-12">&nbsp;</div>
                    <div class="col-xs-12" style="padding-top: 10%">
                        <table style="width: 100%">
                            <tr>
                                <th style="width: 3%; padding-left: 5px; text-align: center"><br />&nbsp;</th>
                                <th style="width: 30%; padding-left: 5px; border-top: 1px solid black; text-align: center"><b>Signature</b><br />(Revenue officer of Customs)</th>
                                <th style="width: 30%; padding-left: 5px; text-align: center"><br />&nbsp;</th>
                                <th style="width: 30%; padding-left: 5px; border-top: 1px solid black; text-align: center"><b>Signature of the Passenger</b><br />(according to passport)</th>
                            </tr>
                        </table>
                    </div>
                    <div class="col-xs-9" style="text-align: right">&nbsp;</div>
                    <div class="col-xs-3" style="font-size: 11px; padding-left: 3%; padding-right: 0px; padding-top: 5px;">
                        Date:
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
