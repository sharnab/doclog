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

    #last_hr{
        page-break-after  : always;
    }

    #last_hr:last-child{
        page-break-after  : avoid;
    }

    .invoice{
        margin:2.5%
    }
    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }

    table, tr, td{
        padding: 5px;
        text-align: center;
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

    #main_table2 td {
        text-align: left;
        padding-bottom: 5px;
        padding-top: 5px;
        font-size: 10px;
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
    @foreach($contentList as $content)
    <div class="portlet light">
        <div class="portlet-body">
        <div class="invoice" >
            <div>
                <div class="row invoice-logo">
                    <div class="col-xs-2 invoice-logo-space">
                        <img src="../../template/metronic/assets/admin/layout4/img/logo-ams.png" class="img-responsive" alt="company logo" style="height:80px"/>
                    </div>
                    <div class="col-xs-8 invoice-logo-space">
                        <p style="margin: 10px 0 0; font-size: 15px; font-weight: bold; text-align: center">
                            Grasp Internation Limited
                        </p>
                        <p style="margin: 0px; font-size: 10px; text-align: center">
                            House # 1, Road # 04, Block # A Ward # 02. West Vaiara. Post #Gulshan, PS # Vatera, Dhaka, Bangladesh
                        </p>
                        <p style="margin: 0px; font-size: 10px; text-align: center">
                            Phone: 09611-352-352. 01986-999-222, Email: sales@graspbd.com, Website: www.grasptravels.com
                        </p>
                        <hr  style="border: 1px solid gray;margin:0; margin-left:9%; width:83%;">
                        <p style="margin: 3px 0 0; font-size: 15px; text-align: center; font-weight: 600">
                            FOREIGN EXCHANGE REGULATION ACT, 1947
                        </p>
                        <hr  style="border: 1px solid gray;margin:0; margin-left:23%; width:55%;">
                        <p style="margin: 0px; font-size: 10px; text-align: center; font-weight: 500">
                            Application to effect booking or passage/s by sea
                        </p>
                        <p style="margin: 0px; font-size: 10px; text-align: center; font-weight: 500">
                            or Air or any other mode of Conveyance on
                        </p>
                        <p style="margin: 0px; font-size: 10px; text-align: center; font-weight: 500">
                            Payment in Bangladesh Taka.
                        </p>
                        <hr  style="border: 1px solid gray;margin:0; margin-left:23%; width:55%;">
                    </div>
                    <div class="col-xs-2 invoice-logo-space">
                        <img src="../../template/metronic/assets/admin/layout4/img/iata-logo.png" class="img-responsive" alt="company logo" style="height:80px; padding-left: 20%"/>
                        <p style="margin: 0px; font-size: 10px; text-align: center">
                            Form 'P'
                        </p>
                        <p style="margin: 0px; font-size: 8px;">
                            ( Portion to be retained
                        </p>
                        <p style="margin: 0px; font-size: 8px;">
                            by the Bangladesh Bank )
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <p style="margin-top: 20px; font-size: 10px;">
                        We apply for permission to book the undermentioned passages for journey from  <u>{{ $content->sector_from }}</u>
                        to <u>{{ $content->sector_to }}</u> as per details given below:
                    </p>
                </div>
                <div class="col-xs-4 invoice-payment">
                    <ul class="list-unstyled">
                        <li>
                            <p style="text-transform: uppercase;"></p>
                        </li>
                    </ul>
                </div>
                <div class="col-xs-12" style="padding-bottom: 20px">
                    <table id="main_table" border="1" style="width: 100%;">
                    <thead>
                    <tr>
                        <th style="vertical-align: top; font-size: 10px">
                                 Name of Steamship<br/>
                                 Airlines of Other/</br/>
                                 Method of</br/>
                                 Conveyance
                        </th>
                        <th style="vertical-align: top; font-size: 10px">
                                Name of Steamer/<br/>
                                Flight No./Data</br/>
                                of departure
                        </th>
                        <th style="vertical-align: top; font-size: 10px">
                             Destination
                        </th>
                        <th style="vertical-align: top; font-size: 10px">
                             Route
                        </th>
                        <th style="vertical-align: top; font-size: 10px">
                            Class or passage</br/>
                            i.e. first class/</br/>
                            tourist class etc.</br/>
                            (as the case may be)
                        </th>
                        <th style="vertical-align: top; font-size: 10px">
                            Cost of</br/>
                            Passage in</br/>
                            Bangladeshi</br/>
                            Currency
                        </th>
                        <th style="vertical-align: top; font-size: 10px">
                            Foreign</br/>
                            carrier</br/>
                            Taka
                        </th>
                        <th style="vertical-align: top; font-size: 10px">
                            Biman</br/>
                            Taka
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td style="font-size: 10px;">QR</td>
                        <td style="font-size: 10px">{{ $content->flight_number}}<br />{{ date('d/m/y', strtotime($content->travel_date)) }}</td>
                        <td style="font-size: 10px">{{ $content->sector_to}}</td>
                        <td style="font-size: 10px">{{ $content->sector_from}}<br/>
                            @if(!empty($content->sector_middle))
                                @php
                                $middle_array = implode('-',$content->sector_middle);
                                foreach($middle_array as $mid_value)
                                    {
                                        echo $mid_value.'<br>';
                                    }
                                @endphp
                                @endif
                            {{ $content->sector_middle}}
                            {{ $content->sector_to}}</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                        <td>&nbsp;</td>
                    </tr>

                    </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table id="main_table2" border="0" style="width: 100%;">
                        <tr>
                            <td style="padding-bottom: 7px; vertical-align: top; font-size: 10px">
                                (a) Full Name. Nationality and Address of the Applicant
                            </td>
                            <td style="padding-bottom: 7px; padding-left: 15px; font-size: 10px">
                                <u><span style="font-weight: 700; font-size: 16px;">Grasp International Limited</span></u><br />
                                House # 1, Road # 04, block # A, Ward #02, West Vatara, Post # Gulshan, PS # Vatara, Dhaka, Bangladesh.
                            </td>
                        </tr>
                        <tr>
                            <td >
                                (b) Full Name of the passenger(s)
                            </td>
                            <td style="padding-left: 15px; border-bottom: 1px solid black;">
                                {{ $content->given_name}}
                            </td>
                        </tr>
                        <tr>
                            <td >
                                Nationality of the Passenger, Passport No. (s) and date of issue
                            </td>
                            <td style="padding-left: 15px; border-bottom: 1px solid black; ">
                                {{ $content->passport_short_name}} | {{ $content->passport_no}} | {{ $content->booking_date}}
                            </td>
                        </tr>
                        <tr>
                            <td >
                                Relationship between Applicant and passenger
                            </td>
                            <td style="padding-left: 15px; border-bottom: 1px solid black;">
                                Client
                            </td>
                        </tr>
                        <tr>
                            <td >
                                Length of residence of Passenger in Bangladesh
                            </td>
                            <td style="padding-left: 15px; border-bottom: 1px solid black; ">
                                Since birth
                            </td>
                        </tr>
                        <tr>
                            <td >
                                Profession or business of Passenger while in Bangladesh
                            </td>
                            <td style="padding-left: 15px; border-bottom: 1px solid black">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td >
                                Purpose of visit for which Passenger is desired to be booked
                            </td>
                            <td style="padding-left: 15px; border-bottom: 1px solid black">
                                {{ $content->visiting_purpose}}
                            </td>
                        </tr>
                        <tr>
                            <td >
                                The date on which the country of destination was visited last
                            </td>
                            <td style="padding-left: 15px; border-bottom: 1px solid black">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td>
                                    Was perimission of the Bangladesh Bank sought for this Passage in the past by the Passenger or by the applicant or any person on this behalf?
                                     If so, the Name of the Office of Bangladesh Bank at which application was made previously and its outcome may be disclosed
                            </td>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 15px; border-bottom: 1px solid black">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td >
                                In the case or * Non-Resident Passengers
                            </td>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 15px; border-bottom: 1px solid black">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td >
                                (a) How funds were obtained for support while in Bangladeshi.
                            </td>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 15px; border-bottom: 1px solid black">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td >
                                (b) Particulars of remittances received from abroad
                            </td>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 15px; border-bottom: 1px solid black">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td >
                                Incase of rebated passage, certificate from airlines concerned should be enclosed indication grant of rebated passage facility under "IATA" Regulations
                            </td>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 15px; border-bottom: 1px solid black">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td >
                                Consideration for which the rebated passage has been granted.
                            </td>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 15px; border-bottom: 1px solid black">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td colspan='2' style="padding-top: 20px; font-size: 10px; padding-bottom: 7px;">
                                I declare that the information furnished by me above is correct and if it is incorrect. I hold myself liable for such action as may be deemed fit under the Foreign Exchange Regulation Act. 1947
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 25px">
                                TKT NO: {{ $content->ticket_number}}
                            </td>
                            <td class="col-xs-6" style="padding-bottom: 7px; font-size: 10px">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 25px">
                                Date: {{ date('d-m-Y',strtotime($content->booking_date))}}
                            </td>
                            <td style="padding-bottom: 7px; font-size: 10px">
                                &nbsp;
                            </td>
                        </tr>
                        <tr>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 25px">
                                For this purpose by the term Non-Resident is meant foreign <br />nationals resident in Bangladesh for less then six months.
                            </td>
                            <td style="padding-bottom: 7px; font-size: 10px; padding-left: 25%">
                                ----------------------------------------<br />
                                (Signature of the Applicant)
                            </td>
                        </tr>
                    </table>
                </div>
                {{-- <div class="col-xs-6">
                    (a) Full Name. Nationality and Address of the Applicant
                </div>
                <div class="col-xs-6">
                    Grasp International Limited
                    House # 1, Road # 04, block # A, Ward #02, West Vatara, Post # Gulshan, PS # Vatara, Dhaka, Bangladesh.
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    (b) Full Name of the passenger(s)
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div> --}}
                {{-- <div class="col-xs-6" style="padding-bottom: 7px">
                    Nationality of the Passenger, Passport No. (s) and date of issue
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    Relationship between Applicant and passenger
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    Length of residence of Passenger in Bangladesh
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    Profession or business of Passenger while in Bangladesh
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    Purpose of visit for which Passenger is desired to be booked
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    The date on which the country of destination was visited last
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-12" style="padding-left: 0px">
                    <div class="col-xs-6" style="padding-bottom: 7px">
                        Was perimission of the Bangladesh Bank sought for this Passage in the past by the Passenger or by the applicant or any person on this behalf?
                         If so, the Name of the Office of Bangladesh Bank at which application was made previously and its outcome may be disclosed
                    </div>
                    <div class="col-xs-6" style="padding-bottom: 7px; padding-left: 22px">
                        ______________________________________
                    </div>
                </div>


                <div class="col-xs-6" style="padding-bottom: 7px">
                    In the case or * Non-Resident Passengers
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    (a) How funds were obtained for support while in Bangladeshi.
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    (b) Particulars of remittances received from abroad
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-12" style="padding-bottom: 7px; padding-left: 0px">
                    <div class="col-xs-6" style="padding-bottom: 7px">
                        Incase of rebated passage, certificate from airlines concerned should be enclosed indication grant of rebated passage facility under "IATA" Regulations
                    </div>
                    <div class="col-xs-6" style="padding-bottom: 7px; padding-left: 22px">
                        ______________________________________
                    </div>
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    Consideration for which the rebated passage has been granted.
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    ______________________________________
                </div>
                <div class="col-xs-12" style="padding-top: 20px; padding-bottom: 7px;">
                    I declare that the information furnished by me above is correct and if it is incorrect. I hold myself liable for such action as may be deemed fit under the Foreign Exchange Regulation Act. 1947
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px; padding-left: 25px">
                    TKT NO: 157-5748782632 3
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    &nbsp;
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px; padding-left: 25px">
                    Date: 27/02/2020
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px">
                    &nbsp;
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px; padding-left: 25px">
                    For this purpose by the term Non-Resident is meant foreign <br />nationals resident in Bangladesh for less then six months.
                </div>
                <div class="col-xs-6" style="padding-bottom: 7px; padding-left: 25%">
                    ----------------------------------------<br />
                    (Signature of the Applicant)
                </div>
            </div> --}}


        </div>
        </div>
        </div>
    </div>
        <hr id="last_hr">
    @endforeach
<div class="row">
    <div class="col-xs-12 invoice-block text-center" style="padding-top: 20px; padding-bottom: 40px">
        <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
            Print <i class="fa fa-print"></i>
        </a>
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
