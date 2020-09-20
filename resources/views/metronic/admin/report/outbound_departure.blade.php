<html moznomarginboxes mozdisallowselectionprint>
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

    .table-bordered, tr, td{
        padding: 5px;
    }

    #invoice td, #invoice th {
      padding: 8px;
    }

    .heading{
        font-size: 10px;
        font-weight: bold;
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
                    <div class="col-xs-9 invoice-logo-space" style="padding-left: 20%; padding-top: 15px;">
                        <img src="{{url('/')}}/assets/admin/layout/img/govt_seal.png"}} class="img-responsive" alt="company logo" style="height:100px; padding-left: 28%"/>
                        <p style="margin: 10px 0 0; padding-left: 10%">
                            Govt. of the People's Republic of Bangladesh
                        </p>
                        <p style="margin: 0; padding-left: 28%">
                            Arrival Card
                        </p>
                        <p style="margin: 0; padding-left: 21%; font-size: 16px; font-weight: bold">
                            (Only for Foreigners)
                        </p>
                        <p style="margin: 0; padding-left: 15%; font-size: 13px; font-weight: bold">
                            <u>PLEASE WRITE IN CAPITAL LETTERS</u>
                        </p>
                    </div>
                </div>
            </div>

            <hr/>
            <div class="row">
                <div class="col-xs-12">
                    @foreach($content as $data)
                    <table border='0' style="width:80%" >
                        <tr>
                            <td class="heading" style="padding-left: 15px; width: 5%; text-align: center">
                                1.
                            </td>
                            <td class="heading" colspan="3" style="width: 10%">
                                Name (As in Passport)
                            </td>
                            <td colspan="8">
                                <span class="dottedUnderline">{{ $data->given_name }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" style="padding-left: 15px; width: 5%; text-align: center">
                                2.
                            </td>
                            <td class="heading" colspan="2" style="width: 10%">
                                Gender
                            </td>
                            <td colspan="2">
                                <div class="col-md-4">
                                    <table class="table-bordered">
                                        <tr class="bordered-tr">
                                            <td style="padding:0 10px 0 10px" class="table-data bordered-td font-size">
                                                @if ($data->gender == 1)
                                                    &#10004;
                                                @else
                                                    &nbsp;
                                                @endif
                                            </td>
                                            <td class="table-data bordered-td">Male</td>
                                            <td style="padding:0 10px 0 10px" class="table-data bordered-td">
                                                @if ($data->gender == 2)
                                                    &#10004;
                                                @else
                                                    &nbsp;
                                                @endif
                                            </td>
                                            <td class="table-data bordered-td">Female</td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td style="width: 30%" >&nbsp;</td>
                            <td class="heading" style="padding-left: 15px; width: 5%">
                                3.
                            </td>
                            <td class="heading" colspan="3">
                                Date of Birth
                            </td>
                            <td colspan="2">
                                <div class="col-md-2">
                                    <table class="table-bordered">
                                        <tr class="bordered-tr">
                                            <td class="table-data bordered-td">Day</td>
                                            <td class="table-data bordered-td">Month</td>
                                            <td class="table-data bordered-td">Year</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="table-data bordered-td" style="text-align: center;">{{ date('d', strtotime($data->date_of_birth)) }}</td>
                                            <td class="table-data bordered-td" style="text-align: center;">{{ date('m', strtotime($data->date_of_birth)) }}</td>
                                            <td class="table-data bordered-td" style="text-align: center;">{{ date('Y', strtotime($data->date_of_birth)) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" style="padding-left: 15px; width: 5%; text-align: center">
                                4.
                            </td>
                            <td class="heading" colspan="2">
                                Nationality
                            </td>
                            <td colspan="9">
                                <span class="dottedUnderline">{{ $data->nationality }}</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" style="padding-left: 15px; width: 5%; text-align: center">
                                5.
                            </td>
                            <td class="heading" colspan="2" style="width: 10%">
                                Passport Number
                            </td>
                            <td colspan="2">
                                <div class="col-md-4">
                                    <span class="dottedUnderline">{{ $data->passport_no }}</span>
                                </div>
                            </td>
                            <td style="width: 30%" >&nbsp;</td>
                            <td class="heading" style="padding-left: 15px; width: 5%">
                                6.
                            </td>
                            <td class="heading" colspan="3" style="width: 10%;">
                                Date of Expiry
                            </td>
                            <td colspan="2">
                                <div class="col-md-2">
                                    <table class="table-bordered">
                                        <tr class="bordered-tr">
                                            <td class="table-data bordered-td">Day</td>
                                            <td class="table-data bordered-td">Month</td>
                                            <td class="table-data bordered-td">Year</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="table-data  bordered-td" style="text-align: center;">{{ date('d', strtotime($data->date_of_expire)) }}</td>
                                            <td class="table-data  bordered-td" style="text-align: center;">{{ date('m', strtotime($data->date_of_expire)) }}</td>
                                            <td class="table-data  bordered-td" style="text-align: center;">{{ date('Y', strtotime($data->date_of_expire)) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" style="padding-left: 15px; width: 5%; text-align: center">
                                7.
                            </td>
                            <td class="heading" colspan="2" style="width: 10%">
                                Visa Expiry Date
                            </td>
                            <td colspan="2">
                                <table class="table-bordered">
                                    <tr class="bordered-tr">
                                        <td class="table-data bordered-td">Day</td>
                                        <td class="table-data">Month</td>
                                        <td class="table-data bordered-td">Year</td>
                                    </tr>
                                    <tr class="bordered-tr">
                                        <td class="table-data bordered-td" style="text-align: center;">{{ date('d', strtotime($data->expiry_date)) }}</td>
                                        <td class="table-data bordered-td" style="text-align: center;">{{ date('m', strtotime($data->expiry_date)) }}</td>
                                        <td class="table-data bordered-td" style="text-align: center;">{{ date('Y', strtotime($data->expiry_date)) }}</td>
                                    </tr>
                                </table>
                            </td>
                            <td style="width: 30%" >&nbsp;</td>
                            <td class="heading" style="padding-left: 15px; width: 5%">
                                8.
                            </td>
                            <td class="heading" colspan="3" style="width: 10%;">
                                Date of Arrival
                            </td>
                            <td colspan="2">
                                <div class="col-md-2">
                                    <table class="table-bordered">
                                        <tr class="bordered-tr">
                                            <td class="table-data bordered-td">Day</td>
                                            <td class="table-data bordered-td">Month</td>
                                            <td class="table-data bordered-td">Year</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="table-data  bordered-td" style="text-align: center;">{{ date('d', strtotime($data->return_date)) }}</td>
                                            <td class="table-data  bordered-td" style="text-align: center;">{{ date('m', strtotime($data->return_date)) }}</td>
                                            <td class="table-data  bordered-td" style="text-align: center;">{{ date('Y', strtotime($data->return_date)) }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" style="padding-left: 15px; width: 5%; text-align: center">
                                9.
                            </td>
                            <td class="heading" colspan="3">
                                Purpose of Visit
                            </td>
                            <td colspan="8">
                                <span class="dottedUnderline">{{ $data->visiting_purpose }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td colspan="12" style="padding-top: 50px">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 30%" >&nbsp;</td>
                            <td colspan="2" style="width: 10%;">
                                Date
                            </td>
                            <td colspan="2" style="padding-top: 20px">
                                <div class="col-md-2">
                                    <table class="table-bordered">
                                        <tr class="bordered-tr">
                                            <td class="table-data bordered-td">Day</td>
                                            <td class="table-data bordered-td">Month</td>
                                            <td class="table-data bordered-td">Year</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="table-data bordered-td" style="text-align: center;">{{ date('d') }}</td>
                                            <td class="table-data bordered-td" style="text-align: center;">{{ date('m') }}</td>
                                            <td class="table-data bordered-td" style="text-align: center;">{{ date('Y') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                            <td colspan="2" style="width: 30%" >&nbsp;</td>
                            <td colspan="4" style="padding-top: 30px; text-align: center;">
                                ...........................................<br/>
                                Passenger's Signature
                            </td>
                            <td colspan="2" style="width: 30%" >&nbsp;</td>
                        </tr>
                        {{-- <tr>
                            <td style="width: 30%" >&nbsp;</td>
                            <td colspan="2" style="width: 10%;">
                                Date
                            </td>
                            <td colspan="2" style="padding-top: 20px">
                                <div class="col-md-2">
                                    <table class="table-bordered">
                                        <tr class="bordered-tr">
                                            <td class="table-data bordered-td">Day</td>
                                            <td class="table-data bordered-td">Month</td>
                                            <td class="table-data bordered-td">Year</td>
                                        </tr>
                                        <tr class="bordered-tr">
                                            <td class="table-data bordered-td" style="text-align: center;">27</td>
                                            <td class="table-data bordered-td" style="text-align: center;">05</td>
                                            <td class="table-data bordered-td" style="text-align: center;">1999</td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr> --}}
                    </table>
                    @endforeach
                </div>
            </div>

            <hr  style="border: 1px solid gray">

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
