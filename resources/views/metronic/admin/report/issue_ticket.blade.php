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

    .local-table-bordered {
      border-collapse: collapse;
    }

    .local-table-bordered, .bordered-td, .bordered-tr {
      border: 1px solid black;
      border-bottom: 0px;
    }

    .foreign-table-bordered {
      border-collapse: collapse;
    }

    .foreign-table-bordered, .bordered-td, .bordered-tr {
      border: 1px solid black;
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
        <div class="invoice">
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <div class="row">
                            <div class="col-md-6">

                            </div>

                        </div>

                        <table style="width:100%;" >

                            <tr>
                                <td colspan="12" style="font-size: 15px; text-align: center"><strong><?php echo 'Only For Miscellaneous Document(Issued Tickets)';?></strong> </td>
                            </tr>
                            <tr>
                                <td colspan="12">&nbsp;</td>
                            </tr>
                            <tr>
                                <td colspan="12" style="font-size: 12px; width:100%;">
                                    <table class="local-table-bordered" style="width:100%;">
                                        <tr class="bordered-tr">
                                            <td colspan="2" style="width: 100%">Airline Name & Code:</td>
                                            <td colspan="10">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td colspan="2" style="width: 100%">Agent Code:</td>
                                            <td colspan="10">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td colspan="2" style="width: 100%">Total Issued Ticket:</td>
                                            <td colspan="10">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td colspan="12" style="width: 100%; text-align: center"><strong>Local Passenger</strong></td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" style="width: 25%; padding: 4px; text-align: center;">One Way Ticket</td>
                                            <td class="bordered-td" style="width: 25%; padding: 4px; text-align: center;">Quantity</td>
                                            <td class="bordered-td" style="width: 25%; padding: 4px; text-align: center;">Return Ticket</td>
                                            <td class="bordered-td" style="width: 25%; padding: 4px; text-align: center;">Quantity</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&#x2610; P Form</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&nbsp;</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&#x2610; P Form</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&#x2610; Passport Photocopy</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&nbsp;</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&#x2610; Passport Photocopy</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&#x2610; Visa Copy</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&nbsp;</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&#x2610; Visa Copy</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&#x2610; Manpower Clearence</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr" style="border-bottom: 0px">
                                            <td class="bordered-td" style="padding: 4px; width: 25%; border-bottom: 0px">&#x2610; NOC for Woman</td>
                                            <td class="bordered-td" style="padding: 4px; width: 25%; border-bottom: 0px">&nbsp;</td>
                                        </tr>
                                    </table>
                                    <table class="foreign-table-bordered" style="width:100%; border-top: 0px">
                                        <tr class="bordered-tr" style="border-top: 0px">
                                            <td class="bordered-td" colspan="12" style="padding: 4px; width: 100%; text-align: center;"><strong>Foreign Passengers/Shiping Crew</strong></td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" style="padding: 4px; width: 35%; ">One Way Ticket &#x2610;</td>
                                            <td class="bordered-td" style="padding: 4px; width: 30%; ">Return Ticket &#x2610;</td>
                                            <td class="bordered-td" style="padding: 4px; width: 22%; text-align: center ">Quantity</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" colspan="2" style="padding: 4px; width: 78%; ">&#x2610; Encashment Original Copy (Photocopy not acceptable)</td>
                                            <td class="bordered-td" style="padding: 4px; width: 22%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" colspan="2" style="padding: 4px; width: 78%; ">&#x2610; P Form</td>
                                            <td class="bordered-td" style="padding: 4px; width: 22%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" colspan="2" style="padding: 4px; width: 75%; ">&#x2610; Passport Photocopy</td>
                                            <td class="bordered-td" style="padding: 4px; width: 22%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" colspan="2" style="padding: 4px; width: 78%; ">&#x2610; Visa Copy</td>
                                            <td class="bordered-td" style="padding: 4px; width: 22%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" colspan="2" style="padding: 4px; width: 78%; ">&#x2610; Original ID Letter/Annexure "B" (Photocopy not acceptable)</td>
                                            <td class="bordered-td" style="padding: 4px; width: 22%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" colspan="2" style="padding: 4px; width: 78%; ">&#x2610; Valid Work Permit</td>
                                            <td class="bordered-td" style="padding: 4px; width: 22%; ">&nbsp;</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="bordered-td" colspan="3" style="padding: 4px 4px 30px 4px; width: 78%; ">Remarks :</td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <div class="col-md-12" style="font-size: 12px; padding-left: 4px">
                            * Per Air Use
                        </div>
                    <!-- END EXAMPLE TABLE PORTLET-->
                </div>
            </div>
            <!-- END PAGE CONTENT-->
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
