<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
@extends('layouts.admin')
@section('extra_css')
    <style type="text/css">
        div.checker {
            margin-top: 2px;
            margin-left: -2px;
        }
    </style>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@endsection
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Ticket Sales <small>List</small></h1>
        </div>
        <!-- END PAGE TITLE -->

    <!-- END PAGE HEAD -->
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('/') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ url('admin/booking') }}">Ticket Sales</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">List</a>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        Booking List
                    </div>
                    <a href="{{route('booking_create')}}" title="New Booking" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right" > <i class="ion-plus-circled"></i> </a>
                </div>
                <div class="portlet-body">
                    <div class="">
                        @include('layouts.alert')
                        <table class="table table-striped table-hover"  id="booking">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Passenger's Name
                                </th>
                                <th>
                                    Contact Number
                                </th>
                                <th>
                                    Ticket Number
                                </th>
                                <th>
                                    Payable Amount
                                </th>
                                <th>
                                    Amount Paid
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 0; ?>
                            @foreach($bookingList as $booking)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $booking['passenger']['given_name'] }}</td>
                                <td>{{ $booking['passenger']['contact_no'] }}</td>
                                <td>{{ $booking['ticket_number'] }}</td>
                                <td>{{ $booking['actual_payable_amount'] }}</td>
                                <td>{{ $booking['paid_amount'] }}</td>
                                <td>
                                    <span class="label label-sm label-{{ $booking['active_status'] == 1 ? 'success' : 'danger' }} ">
                                    {{ $booking['active_status'] == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <button onclick="getBookingData(1)" id="pick-icon" type="button" data-toggle="modal" title="View" class="btn btn-icon-only green" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ion-eye"></i></button>
                                    @if($booking->has_invoice)
                                        <a href="{{route('invoice_view',$booking['id'])}}" class="btn btn-icon-only purple" title="View Invoice"><i class="fa fa-certificate"></i></a>
                                        @else
                                        <a href="{{route('generate_invoice',$booking['id'])}}" class="btn btn-icon-only green-haze" title="Generate Invoice"><i class="fa fa-certificate"></i></a>
                                    <a href="{{route('booking_edit',$booking['id'])}}" class="btn btn-icon-only purple" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a href="#" class="btn btn-icon-only red"><i class="fa fa-times"></i></a>

                                    @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>

                        </table>
                    </div>
                </div>

                {{-- Booking entry modal view --}}
                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content" style="height: 700px">
                            <div class="modal-body" style="padding: 10px;">
                                <button class="pull-right md-close btn-sm btn-danger waves-effect waves-light"></button>
                                <div class="form-body">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Passnger</label>
                                            <div class="col-md-3 passenger_name">

                                            </div>
                                            <label class="col-md-3 control-label required">Booking Date</label>
                                            <div class="col-md-3 booking_date">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Booking Reference</label>
                                            <div class="col-md-3 booking_reference">
                                            </div>
                                            <label class="col-md-3 control-label required">Airlines</label>
                                            <div class="col-md-3 airline_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Ticket Type</label>
                                            <div class="col-md-3 ticket_type">
                                            </div>
                                            <label class="col-md-3 control-label required">Ticket Number</label>
                                            <div class="col-md-3 ticket_number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Flight Number</label>
                                            <div class="col-md-3 flight_number">
                                            </div>
                                            <label class="col-md-3 control-label required">Purpose of Visit</label>
                                            <div class="col-md-3 visiting_purpose">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Sector</label>
                                            <div class="col-md-3 sector_name">
                                            </div>
                                            <label class="col-md-3 control-label required">Base Fare</label>
                                            <div class="col-md-3 base_fare">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Tax</label>
                                            <div class="col-md-3 tax">
                                            </div>
                                            <label class="col-md-3 control-label required">AIT</label>
                                            <div class="col-md-3 ait">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Airline's VAT</label>
                                            <div class="col-md-3 airlines_vat">
                                            </div>
                                            <label class="col-md-3 control-label required">Total Fare</label>
                                            <div class="col-md-3 total_fare">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Discount Type</label>
                                            <div class="col-md-3 discount_type">
                                            </div>
                                            <label class="col-md-3 control-label required">Discount Amount</label>
                                            <div class="col-md-3 discount_amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Reissue/Refund Charged</label>
                                            <div class="col-md-3 reissue_or_refund_charged">
                                            </div>
                                            <label class="col-md-3 control-label required">Customer Charged</label>
                                            <div class="col-md-3 customer_charged">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Payable Amount</label>
                                            <div class="col-md-3 payable_amount">
                                            </div>
                                            <label class="col-md-3 control-label required">Actual Payable Amount</label>
                                            <div class="col-md-3 actual_payable_amount">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Paid Amount</label>
                                            <div class="col-md-3 paid_amount">
                                            </div>
                                            <label class="col-md-3 control-label required">Agency</label>
                                            <div class="col-md-3 agency_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Agency Payment</label>
                                            <div class="col-md-3 agency_payment">
                                            </div>
                                            <label class="col-md-3 control-label required">Issue Type</label>
                                            <div class="col-md-3 issue_type">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Staff's Name</label>
                                            <div class="col-md-3 staff_name">
                                            </div>
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-3 status">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Reference's Name</label>
                                            <div class="col-md-3 customer_name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <label class="col-md-3 control-label required">Ticket Image</label>
                                        <div class="col-md-9 ticket_image">
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript" src="{{ url('template/metronic') }}/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ url('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        jQuery('#booking').DataTable();
    });
    $(document).on("click", ".md-close", function(e){
        $('#myModal').modal('hide');
    });

    function getBookingData(booking_id) {
        $.ajax({
            url: 'booking/show/'+booking_id,
            type: 'get',
            dataType: 'json',
            success: function(response){
                 $('div.actual_payable_amount').text(response[0]['actual_payable_amount']);
                 $('div.agency_name').text(response[0]['agency_name']);
                 $('div.agency_payment').text(response[0]['agency_payment']);
                 $('div.airline_name').text(response[0]['airline_name']);
                 $('div.airlines_vat').text(response[0]['airlines_vat']);
                 $('div.ait').text(response[0]['ait']);
                 $('div.base_fare').text(response[0]['base_fare']);
                 $('div.booking_date').text(response[0]['booking_date']);
                 $('div.booking_reference').text(response[0]['booking_reference']);
                 $('div.customer_charged').text(response[0]['customer_charged']);
                 $('div.customer_name').text(response[0]['customer_name']);
                 $('div.discount_amount').text(response[0]['discount_amount']);

                 if(response[0]['discount_type'] == 1){
                     $('div.discount_type').text('Amount');
                 } else {
                     $('div.discount_type').text('Percentage');
                 }

                 if(response[0]['issue_type'] == 1){
                     $('div.issue_type').text('Individual');
                 } else {
                     $('div.issue_type').text('Corporate');
                 }
                 $('div.paid_amount').text(response[0]['paid_amount']);
                 $('div.passenger_name').text(response[0]['passenger_name']);
                 $('div.payable_amount').text(response[0]['payable_amount']);
                 $('div.reissue_or_refund_charged').text(response[0]['reissue_or_refund_charged']);
                 $('div.sector_name').text(response[0]['sector_name']);
                 $('div.staff_name').text(response[0]['staff_name']);
                 $('div.tax').text(response[0]['tax']);
                 $('div.tax').text(response[0]['customer_name']);

                 $(".ticket_image").html($("<img>").attr("src", "../"+response[0]['ticket_image']).height(250));
                 // $('div').text(response[0]['ticket_image']);
                 $('div.ticket_number').text(response[0]['ticket_number']);
                 $('div.total_fare').text(response[0]['total_fare']);
            }
        });
    }
</script>

@endsection
