<head>
    {{-- <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script> --}}
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
<link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
@endsection

@section('content')
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Booking <small>Edit</small></h1>
        </div>
        <!-- END PAGE TITLE -->

    <!-- END PAGE HEAD -->
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('/') }}">Dashboard</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ url('admin/booking') }}">Booking</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Edit</a>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-home"></i>Edit Booking
                    </div>
                    <a href="{{route('booking')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['url' => route( 'booking_update',$booking['id'] ) , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}
                        {{method_field('PUT')}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Passenger</label>
                                <div class="col-md-6 {{ $errors->has('passenger_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2 passenger" name="passenger_id" id="passenger">
                                        <option value=""></option>
                                        @foreach ($allPassengers as $passengerId => $passengerName )
                                        <option value="{{ $passengerId }}" {{ $booking['passenger_id'] == $passengerId ? 'selected' : '' }} >
                                            {{ $passengerName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('passenger_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('passenger_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <button id="pick-icon" type="button" title="Add" class="panel-title-btn btn waves-effect waves-light btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Booking Date</label>
                                <div class="col-md-6 {{ $errors->has('booking_date') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-calendar "></i>
                                        <input type="text" class="form-control datepicker" name="booking_date" placeholder="dd-mm-yyyy" value="{{ old('booking_date') ? old('booking_date') : $booking['booking_date'] }}"  >
                                        @if ($errors->has('booking_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('booking_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Booking Reference</label>
                                <div class="col-md-6 {{ $errors->has('booking_reference') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-group"></i>
                                        <textarea class="form-control" name="booking_reference" placeholder="Booking Reference" >{{ old('booking_reference') ? old('booking_reference') : $booking['booking_reference'] }}</textarea>
                                        @if ($errors->has('booking_reference'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('booking_reference') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Airline</label>
                                <div class="col-md-6 {{ $errors->has('airlines_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="airlines_id" id="airline">
                                        <option value=""></option>
                                        @foreach ($allAirlines as $airlineId => $airlineName )
                                        <option value="{{ $airlineId }}" {{ $booking['airlines_id'] == $airlineId ? 'selected' : '' }} >
                                            {{ $airlineName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('airlines_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('airlines_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ticket Type</label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="ticket_type" value="1" {{ $booking['ticket_type'] == 1 ? 'checked' : '' }}  > One Way </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="ticket_type" value="2" {{ $booking['ticket_type'] == 2 ? 'checked' : '' }}  > With Return </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Ticket Number</label>
                                <div class="col-md-6 {{ $errors->has('ticket_number') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="ticket_number" value="{{ old('ticket_number') ? old('ticket_number') : $booking['ticket_number'] }}" placeholder="Ticket Number" required>
                                        @if ($errors->has('ticket_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ticket_number') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Flight Number</label>
                                <div class="col-md-6 {{ $errors->has('flight_number') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="flight_number" value="{{ old('flight_number') ? old('flight_number') : $booking['flight_number'] }}" placeholder="Flight Number" required>
                                        @if ($errors->has('flight_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('flight_number') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Purpose of Visit</label>
                                <div class="col-md-6 {{ $errors->has('visiting_purpose') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="visiting_purpose" value="{{ old('visiting_purpose') ? old('visiting_purpose') : $booking['visiting_purpose'] }}" placeholder="Purpose of Visit" required>
                                        @if ($errors->has('visiting_purpose'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('visiting_purpose') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Sector</label>
                                <div class="col-md-6 {{ $errors->has('sector_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="sector_id" id="sector">
                                        <option value=""></option>
                                        @foreach ($allSectors as $sectorId => $sectorName )
                                        <option value="{{ $sectorId }}" {{ $booking['sector_id'] == $sectorId ? 'selected' : '' }} >
                                            {{ $sectorName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('sector_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('sector_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Base Fare</label>
                                <div class="col-md-6 {{ $errors->has('base_fare') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="base_fare" value="{{ old('base_fare') ? old('base_fare') : $booking['base_fare'] }}" placeholder="Base Fare" required>
                                        @if ($errors->has('base_fare'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('base_fare') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Tax</label>
                                <div class="col-md-6 {{ $errors->has('tax') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="tax" value="{{ old('tax') ? old('tax') : $booking['tax'] }}" placeholder="Tax" >
                                        @if ($errors->has('tax'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('tax') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">AIT</label>
                                <div class="col-md-6 {{ $errors->has('ait') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control" name="ait" value="{{ old('ait') ? old('ait') : $booking['ait'] }}" placeholder="AIT" readonly>
                                        @if ($errors->has('ait'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ait') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Airline's VAT</label>
                                <div class="col-md-6 {{ $errors->has('airlines_vat') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="airlines_vat" value="{{ old('airlines_vat') ? old('airlines_vat') : $booking['airlines_vat'] }}" placeholder="Airline's VAT" required readonly>
                                        @if ($errors->has('airlines_vat'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('airlines_vat') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Total Fare</label>
                                <div class="col-md-6 {{ $errors->has('total_fare') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="total_fare" value="{{ old('total_fare') ? old('total_fare') : $booking['total_fare'] }}" placeholder="Total Fare" >
                                        @if ($errors->has('total_fare'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('total_fare') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Discount Type</label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="discount_type" value="1" {{ $booking['discount_type'] == 1 ? 'checked' : '' }}  > Amount </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="discount_type" value="2" {{ $booking['discount_type'] == 2 ? 'checked' : '' }}  > Percentage </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Discount Amount</label>
                                <div class="col-md-6 {{ $errors->has('discount_amount') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="discount_amount" value="{{ old('discount_amount') ? old('discount_amount') : $booking['discount_amount'] }}" placeholder="Discount Amount/Percentage" >
                                        @if ($errors->has('discount_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discount_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Reissue/Refund Charged</label>
                                <div class="col-md-6 {{ $errors->has('reissue_or_refund_charged') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control" name="reissue_or_refund_charged" value="{{ old('reissue_or_refund_charged') ? old('reissue_or_refund_charged') : $booking['reissue_or_refund_charged'] }}" placeholder="Reissue/Refund Charged" >
                                        @if ($errors->has('reissue_or_refund_charged'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('reissue_or_refund_charged') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Customer Charged</label>
                                <div class="col-md-6 {{ $errors->has('customer_charged') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="customer_charged" value="{{ old('customer_charged') ? old('customer_charged') : $booking['customer_charged'] }}" placeholder="Customer Charged" required>
                                        @if ($errors->has('customer_charged'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('customer_charged') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Payable Amount</label>
                                <div class="col-md-6 {{ $errors->has('payable_amount') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="payable_amount" value="{{ old('payable_amount') ? old('payable_amount') : $booking['payable_amount'] }}" placeholder="Payable Amount" readonly>
                                        @if ($errors->has('payable_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('payable_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Actual Payable Amount</label>
                                <div class="col-md-6 {{ $errors->has('actual_payable_amount') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control" name="actual_payable_amount" value="{{ old('actual_payable_amount') ? old('actual_payable_amount') : $booking['actual_payable_amount'] }}" placeholder="Actual Payable Amount" >
                                        @if ($errors->has('actual_payable_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('actual_payable_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Paid Amount</label>
                                <div class="col-md-6 {{ $errors->has('paid_amount') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="paid_amount" value="{{ old('paid_amount') ? old('paid_amount') : $booking['paid_amount'] }}" placeholder="Paid Amount" required>
                                        @if ($errors->has('paid_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('paid_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Agency</label>
                                <div class="col-md-6 {{ $errors->has('agency_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="agency_id" id="agency">
                                        <option value=""></option>
                                        @foreach ($allAgencies as $agencyId => $agencyName )
                                        <option value="{{ $agencyId }}" {{ $booking['agency_id'] == $agencyId ? 'selected' : '' }} >
                                            {{ $agencyName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('agency_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('agency_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Agency Payment</label>
                                <div class="col-md-6 {{ $errors->has('agency_payment') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="agency_payment" value="{{ old('agency_payment') ? old('agency_payment') : $booking['agency_payment'] }}" placeholder="Agency Payment" >
                                        @if ($errors->has('agency_payment'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('agency_payment') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Issue Type</label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="issue_type" value="1" {{ $booking['issue_type'] == 1 ? 'checked' : '' }}  > Individual </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="issue_type" value="2" {{ $booking['issue_type'] == 2 ? 'checked' : '' }}  > Corporate </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Ticket Image</label>
                                <div class="col-md-6 {{ $errors->has('ticket_image') ? 'has-error' : '' }}">
                                    @if ($booking['ticket_image'])
                                        <img src="{{url($booking->ticket_image)}}" height="100" />
                                        <button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                                    @else
                                        <input type="file" name="image" class="form-control">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Reference's Name</label>
                                <div class="col-md-6 {{ $errors->has('reference_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="reference_id" id="reference">
                                        <option value=""></option>
                                        @foreach ($allCustomers as $customerId => $customerName )
                                        <option value="{{ $customerId }}"  {{ $booking['reference_id'] == $customerId ? 'selected' : '' }}>
                                            {{ $customerName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('reference_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('reference_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Staff's Name</label>
                                <div class="col-md-6 {{ $errors->has('staff_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="staff_id" id="staff">
                                        <option value=""></option>
                                        @foreach ($allUser as $userId => $userName )
                                        <option value="{{ $userId }}" {{ $booking['staff_id'] == $userId ? 'selected' : '' }} >
                                            {{ $userName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('staff_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('staff_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="1" {{ $booking['active_status'] == 1 ? 'checked' : '' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="2" {{ $booking['active_status'] == 2 ? 'checked' : '' }}  > No </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('booking') }}" class="btn default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
                <div class="modal fade bs-example-modal-lg" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-body" style="padding: 10px;">
                                <button class="pull-right md-close btn-sm btn-danger waves-effect waves-light"></button>
                                {{ Form::open(['route' => 'passenger_store' , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}

                                    <div class="form-body">
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Customer</label>
                                            <div class="col-md-6 {{ $errors->has('customer_id') ? 'has-error' : '' }}">
                                                <select class="form-control select2" name="customer_id" id="customer">
                                                    <option value=""></option>
                                                    @foreach ($allCustomers as $customerId => $customerName )
                                                    <option value="{{ $customerId }}" >
                                                        {{ $customerName }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('customer_id'))
                                                <span class="help-block has-error">
                                                    <strong>{{ $errors->first('customer_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Relation With Customer</label>
                                            <div class="col-md-6 {{ $errors->has('customer_relation') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-group"></i>
                                                    <input type="text" class="form-control" name="customer_relation" value="{{ old('customer_relation') }}" placeholder="Relation with Customer" >
                                                    @if ($errors->has('customer_relation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('customer_relation') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Surname</label>
                                            <div class="col-md-6 {{ $errors->has('sur_name') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" name="sur_name" value="{{ old('sur_name') }}" placeholder="Surame" required>
                                                    @if ($errors->has('sur_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('sur_name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Given name</label>
                                            <div class="col-md-6 {{ $errors->has('given_name') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" name="given_name" value="{{ old('given_name') }}" placeholder="Given name" required>
                                                    @if ($errors->has('given_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('given_name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Contact No</label>
                                            <div class="col-md-6 {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-phone-square"></i>
                                                    <input type="text" class="form-control" name="contact_no" value="{{ old('contact_no') }}" placeholder="Contact No" maxlength="15" >
                                                    @if ($errors->has('contact_no'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('contact_no') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">National ID</label>
                                            <div class="col-md-6 {{ $errors->has('personal_no') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-credit-card"></i>
                                                    <input type="text" class="form-control" name="personal_no" value="{{ old('personal_no') }}" placeholder="National ID" maxlength="17" >
                                                    @if ($errors->has('personal_no'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('personal_no') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Gender</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                    <input type="radio" name="gender" value="1" {{ old('gender') != 2 && old('gender') != 3 ? 'checked' : '' }}  > Male </label>
                                                    <label class="radio-inline">
                                                    <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}  > Female </label>
                                                    <label class="radio-inline">
                                                    <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}  > Other </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Nationality</label>
                                            <div class="col-md-6 id="select_nationality" {{ $errors->has('nationality') ? 'has-error' : '' }}">
                                                <select class="form-control select2" name="nationality" id="nationality" >
                                                    <option value="">Select Nation</option>
                                                    @foreach ($allNations as $nationValue => $nationName )
                                                    <option value="{{ $nationValue }}" >
                                                        {{ $nationName }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('nationality'))
                                                <span class="help-block has-error">
                                                    <strong>{{ $errors->first('nationality') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Date OF Birth</label>
                                            <div class="col-md-6 {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-calendar "></i>
                                                    <input type="text" class="form-control datepicker" name="date_of_birth" value="{{ old('date_of_birth') }}" placeholder="dd-mm-yyyy" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" >
                                                    @if ($errors->has('date_of_birth'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date_of_birth') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Birth Place</label>
                                            <div class="col-md-6 {{ $errors->has('place_of_birth') ? 'has-error' : '' }}">
                                                <input type="text" class="form-control" name="place_of_birth" value="{{ old('place_of_birth') }}" placeholder="Birth Place" >
                                                @if ($errors->has('place_of_birth'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('place_of_birth') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Passport No</label>
                                            <div class="col-md-6 {{ $errors->has('passport_no') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" name="passport_no" value="{{ old('passport_no') }}" placeholder="Passport No" required>
                                                    @if ($errors->has('passport_no'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('passport_no') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Previous Passport No</label>
                                            <div class="col-md-6 {{ $errors->has('previous_passport_no') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-phone-square"></i>
                                                    <input type="text" class="form-control" name="previous_passport_no" value="{{ old('previous_passport_no') }}" placeholder="Previous Passport No" >
                                                    @if ($errors->has('previous_passport_no'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('previous_passport_no') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Issuing Authority</label>
                                            <div class="col-md-6 {{ $errors->has('issuing_authority') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-phone-square"></i>
                                                    <input type="text" class="form-control" name="issuing_authority" value="{{ old('issuing_authority') }}" placeholder="Issuing Authority" >
                                                    @if ($errors->has('issuing_authority'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('issuing_authority') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Emergency Personnel Name</label>
                                            <div class="col-md-6 {{ $errors->has('emergency_name') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" name="emergency_name" value="{{ old('emergency_name') }}" placeholder="Emergency Personnel Name" required>
                                                    @if ($errors->has('emergency_name'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('emergency_name') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Emergency Contact No</label>
                                            <div class="col-md-6 {{ $errors->has('emergency_contact') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-phone-square"></i>
                                                    <input type="text" class="form-control" name="emergency_contact" value="{{ old('emergency_contact') }}" placeholder="Emergency Personnel Contact No" maxlength="15" required>
                                                    @if ($errors->has('emergency_contact'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('emergency_contact') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Emergency Personnel Relation</label>
                                            <div class="col-md-6 {{ $errors->has('emergency_relation') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-people"></i>
                                                    <input type="text" class="form-control" name="emergency_relation" value="{{ old('emergency_relation') }}" placeholder="Relation with Emergency Personnel" >
                                                    @if ($errors->has('emergency_relation'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('emergency_relation') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Emergency Address</label>
                                            <div class="col-md-6 {{ $errors->has('emergency_address') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-envelope-o"></i>
                                                    <textarea class="form-control" name="emergency_address" id="emergency_address" placeholder="Emergency Personnel Address" >{{ old('emergency_address') }}</textarea>
                                                    @if ($errors->has('emergency_address'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('emergency_address') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Billing Address</label>
                                            <div class="col-md-6 {{ $errors->has('billing_address') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-envelope-o"></i>
                                                    <textarea class="form-control" name="billing_address" id="billing_address" placeholder="Billing Address" >{{ old('billing_address') }}</textarea>
                                                    @if ($errors->has('billing_address'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('billing_address') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Sales Executive</label>
                                            <div class="col-md-6 {{ $errors->has('sales_executive_id') ? 'has-error' : '' }}">
                                                <select class="form-control select2" name="sales_executive_id" id="sales_executive">
                                                    <option value=""></option>
                                                    @foreach ($allSalesExecutives as $salesExecutiveId => $salesExecutiveName )
                                                    <option value="{{ $salesExecutiveId }}" >
                                                        {{ $salesExecutiveName }}
                                                    </option>
                                                    @endforeach
                                                </select>

                                                @if ($errors->has('sales_executive_id'))
                                                <span class="help-block has-error">
                                                    <strong>{{ $errors->first('sales_executive_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Issuing Date</label>
                                            <div class="col-md-6 {{ $errors->has('date_of_issue') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-calendar "></i>
                                                    <input type="text" class="form-control datepicker" name="date_of_issue" value="{{ old('date_of_issue') }}" placeholder="dd-mm-yyyy" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" >
                                                    @if ($errors->has('date_of_issue'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date_of_issue') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label required">Expiry Date</label>
                                            <div class="col-md-6 {{ $errors->has('date_of_expire') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-calendar"></i>
                                                    <input type="text" class="form-control datepicker" name="date_of_expire" value="{{ old('date_of_expire') }}" placeholder="dd-mm-yyyy" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" id="datapicker" >
                                                    @if ($errors->has('date_of_expire'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('date_of_expire') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-3 control-label">Status</label>
                                            <div class="col-md-6">
                                                <div class="radio-list">
                                                    <label class="radio-inline">
                                                    <input type="radio" name="active_status" value="1" {{ (old('active_status') == 1 || old('active_status') == '') ? 'checked' : '' }}  > Yes </label>
                                                    <label class="radio-inline">
                                                    <input type="radio" name="active_status" value="2" {{ old('active_status') == 2 ? 'checked' : '' }}  > No </label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-offset-3 col-md-6">
                                                <button type="button" class="btn green" id="add_passenger">Submit</button>
                                                <button type="reset" class="btn red">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                {{ Form::close() }}
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
<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#passenger').select2({
    placeholder: "select a passenger",
    allowClear: true
});

$('#agency').select2({
    placeholder: "select a agency",
    allowClear: true
});

$('#reference').select2({
    placeholder: "select a reference",
    allowClear: true
});

// $('#nationality').select2({
//     dropdownParent: $('#myModal'),
//     placeholder: "select a nationality",
//     tags:true
// });
//
// $('#customer').select2({
//     placeholder: "select a customer",
//     tags:true
// });
//
// $('#sales_executive').select2({
//     placeholder: "select a sales executive",
//     tags:true
// });

$('#airline').select2({
    placeholder: "select a airline",
    tags:true
});

$('#staff').select2({
    placeholder: "select a staff",
    tags:true
});

$('#sector').select2({
    placeholder: "select a sector",
    tags:true
});

$(document).on("click", "#add_passenger", function(e){
    if($('#customer').val() != '' && $("input[name=sur_name]").val() != ''&& $("input[name=contact_no]").val() != ''){
        var passengerData = {
            customer             : $('#customer').val(),
            nationality          : $('#nationality').val(),
            sales_executive      : $('#sales_executive').val(),
            customer_relation    : $("input[name=customer_relation]").val(),
            sur_name             : $("input[name=sur_name]").val(),
            given_name           : $("input[name=given_name]").val(),
            contact_no           : $("input[name=contact_no]").val(),
            personal_no          : $("input[name=personal_no]").val(),
            gender               : $("input[name=gender]").val(),
            date_of_birth        : $("input[name=date_of_birth]").val(),
            place_of_birth       : $("input[name=place_of_birth]").val(),
            passport_no          : $("input[name=passport_no]").val(),
            // image                : $("#image").val(),
            previous_passport_no : $("input[name=previous_passport_no]").val(),
            issuing_authority    : $("input[name=issuing_authority]").val(),
            emergency_name       : $("input[name=emergency_name]").val(),
            emergency_contact    : $("input[name=emergency_contact]").val(),
            emergency_relation   : $("input[name=emergency_relation]").val(),
            emergency_address    : $("#emergency_address").val(),
            billing_address      : $("#billing_address").val(),
            date_of_issue        : $("input[name=date_of_issue]").val(),
            date_of_expire       : $("input[name=date_of_expire]").val(),
            active_status        : $("input[name=active_status]").val()

        };

        store_passenger(passengerData);
    }
});

function store_passenger(passengerData) {
    $.ajax({
       method:'POST',
       url:'{{url("admin/passenger/ajaxRequestPost")}}',
       dataType:"JSON",
       data: { _token: "{{ csrf_token() }}" , passengerData }
        }).done(function( resultData ) {
            console.log(resultData);
            if(resultData.success == 1){
                var len = resultData.data.length;

                $("#passenger").empty();
                for( var i = 0; i<len; i++){
                    var id = resultData.data[i]['id'];
                    var name = resultData.data[i]['given_name'];
                    $("#passenger").append("<option value='"+id+"'>"+name+"</option>");

                }
                alert('Passenger Data Saved Successfully.');
                setTimeout(function(){
                    $('#myModal').modal('hide');
                }, 100);
            }
            else {
                var announce = resultData.replace("\\n", "\n").slice(0, -2);
                alert(announce);
            }

        });

}

$(document).on("click", ".md-close", function(e){
    $('#myModal').modal('hide');
});

$(document).ready(function() {
    $('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        autoclose: true
    });

    $('input[name=base_fare]').on('keyup', function (){
        $('input[name=ait]').val(parseInt($('input[name=base_fare]').val() * .3));
        $('input[name=airlines_vat]').val(parseInt(($('input[name=base_fare]').val() * .07) * .15));
        $('input[name=total_fare]').val(parseInt($('input[name=base_fare]').val()) + parseInt($('input[name=airlines_vat]').val()) + parseInt($('input[name=ait]').val()) + parseInt($('input[name=tax]').val()));
        if(isNaN($('input[name=total_fare]').val())){
            $('input[name=total_fare]').val(0);
        }
    });
    $('input[name=tax]').on('keyup', function (){
        $('input[name=total_fare]').val(parseInt($('input[name=base_fare]').val()) + parseInt($('input[name=airlines_vat]').val()) + parseInt($('input[name=ait]').val()) + parseInt($('input[name=tax]').val()));
        if(isNaN($('input[name=total_fare]').val())){
            $('input[name=total_fare]').val(0);
        }
    });

    $('input[name=discount_amount]').on('keyup', function (){
        if($('input[name="discount_type"]:checked').val() == 1){
            $('input[name=payable_amount]').val(parseInt($('input[name=total_fare]').val()) - parseInt($('input[name=discount_amount]').val()));
        } else {
            $('input[name=payable_amount]').val(parseInt($('input[name=total_fare]').val()) - parseInt(parseInt($('input[name=total_fare]').val()) * (parseInt($('input[name=discount_amount]').val()) / 100)));
        }
        if(isNaN($('input[name=payable_amount]').val())){
            $('input[name=payable_amount]').val(0);
        }
    });

    $('input[name="discount_type"]').on('change', function (){
        if($('input[name="discount_type"]:checked').val() == 1){
            $('input[name=payable_amount]').val(parseInt($('input[name=total_fare]').val()) - parseInt($('input[name=discount_amount]').val()));
        } else {
            $('input[name=payable_amount]').val(parseInt($('input[name=total_fare]').val()) - parseInt(parseInt($('input[name=total_fare]').val()) * (parseInt($('input[name=discount_amount]').val()) / 100)));
        }
        if(isNaN($('input[name=payable_amount]').val())){
            $('input[name=payable_amount]').val(0);
        }
    });
});

</script>
@endsection
