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
<link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
@endsection

@section('content')
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Ticket Sales <small>New</small></h1>
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
            <a href="{{ url('admin/booking') }}">Ticket Sales</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">New</a>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-home"></i>Create New Booking
                    </div>
                    <a href="{{route('booking')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['route' => 'booking_store' , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Passenger</label>
                                <div class="col-md-6 {{ $errors->has('passenger_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2 passenger" name="passenger_id" id="passenger">
                                        <option value=""></option>
                                        @foreach ($allPassengers as $passengerId => $passengerName )
                                        <option value="{{ $passengerId }}" {{ (old('passenger_id') == $passengerId) ? 'selected' : '' }} >
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
                                    <a href="{{ route('passenger_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Seat Class</label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="seat_class" value="1" {{ old('seat_class') == 1 ? 'checked' : '' }}  > Business Class </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="seat_class" value="2" {{ old('seat_class') == 2 ? 'checked' : '' }}  > Economy Class </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Booking Date</label>
                                <div class="col-md-6 {{ $errors->has('booking_date') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-calendar "></i>
                                        <input type="text" class="form-control datepicker" name="booking_date" value="{{ old('booking_date') }}" placeholder="dd-mm-yyyy" >
                                        @if ($errors->has('booking_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('booking_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Travel Date</label>
                                <div class="col-md-6 {{ $errors->has('travel_date') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-calendar "></i>
                                        <input type="text" class="form-control datepicker" name="travel_date" value="{{ old('travel_date') }}" placeholder="dd-mm-yyyy" >
                                        @if ($errors->has('travel_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('travel_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Return Date</label>
                                <div class="col-md-6 {{ $errors->has('return_date') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-calendar "></i>
                                        <input type="text" class="form-control datepicker" name="return_date" value="{{ old('return_date') }}" placeholder="dd-mm-yyyy" >
                                        @if ($errors->has('return_date'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('return_date') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Booking Reference</label>
                                <div class="col-md-6 {{ $errors->has('booking_reference') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-group"></i>
                                        <textarea class="form-control" name="booking_reference" placeholder="Booking Reference" >{{ old('booking_reference') }}</textarea>
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
                                        <option value="{{ $airlineId }}" {{ (old('airlines_id') == $airlineId) ? 'selected' : '' }} >
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
                                <div class="col-md-3">
                                    <a href="{{ route('airline_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Ticket Type</label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="ticket_type" value="1" {{ old('ticket_type') == 1 ? 'checked' : '' }}  > One Way </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="ticket_type" value="2" {{ old('ticket_type') == 2 ? 'checked' : '' }}  > With Return </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Ticket Number</label>
                                <div class="col-md-6 {{ $errors->has('ticket_number') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="ticket_number" value="{{ old('ticket_number') }}" placeholder="Ticket Number" required>
                                        @if ($errors->has('ticket_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ticket_number') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Flight Number</label>
                                <div class="col-md-6 {{ $errors->has('flight_number') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="flight_number" value="{{ old('flight_number') }}" placeholder="Flight Number" required>
                                        @if ($errors->has('flight_number'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('flight_number') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Purpose of Visit</label>
                                <div class="col-md-6 {{ $errors->has('visiting_purpose') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="visiting_purpose" value="{{ old('visiting_purpose') }}" placeholder="Purpose of Visit" required>
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
                                <div class="col-md-2 {{ $errors->has('sector_from') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="sector_from" value="{{ old('sector_from') }}" placeholder="From" required>
                                    @if ($errors->has('sector_from'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sector_from') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2 {{ $errors->has('sector_middle') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="sector_middle" value="{{ old('sector_middle') }}" placeholder="Middle" required>
                                    @if ($errors->has('sector_middle'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sector_middle') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-2 {{ $errors->has('sector_to') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="sector_to" value="{{ old('sector_to') }}" placeholder="To" required>
                                    @if ($errors->has('sector_to'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sector_to') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Currency</label>
                                <div class="col-md-6 {{ $errors->has('currency_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="currency_id" id="currency">
                                        <option value=""></option>
                                        @foreach ($allCurrencies as $currencyId => $currencyName )
                                        <option value="{{ $currencyId }}" {{ (old('currency_id') == $currencyId) ? 'selected' : '' }} >
                                            {{ $currencyName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('currency_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('currency_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('currency.create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Base Fare</label>
                                <div class="col-md-6 {{ $errors->has('base_fare') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="base_fare" value="{{ old('base_fare') ? old('base_fare') : 0 }}" placeholder="Base Fare" required>
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
                                        <input type="text" class="form-control" name="tax" value="{{ old('tax') ? old('tax') : 0 }}" placeholder="Tax" >
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
                                <div class="col-md-2 {{ $errors->has('ait_percentage') ? 'has-error' : '' }}">
                                    <div>
                                        <input type="text" class="form-control" name="ait_percentage" value="{{ old('ait_percentage') ? old('ait_percentage') : 0.3 }}" placeholder="AIT">
                                        @if ($errors->has('ait_percentage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ait_percentage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-4 {{ $errors->has('ait') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control" name="ait" value="{{ old('ait') ? old('ait') : 0 }}" placeholder="AIT">
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
                                        <input type="text" class="form-control" name="airlines_vat" value="{{ old('airlines_vat') ? old('airlines_vat') : 0 }}" placeholder="Airline's VAT" required readonly>
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
                                        <input type="text" class="form-control" name="total_fare" value="{{ old('total_fare')?old('total_fare'):0 }}" placeholder="Total Fare" >
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
                                        <input type="radio" name="discount_type" value="1" {{ old('discount_type') == 1 ? 'checked' : '' }}  > Amount </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="discount_type" value="2" {{ old('discount_type') == 2 ? 'checked' : '' }}  > Percentage </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group percentage">
                                <label class="col-md-3 control-label">Percentage</label>
                                <div class="col-md-6 {{ $errors->has('percentage') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-deviantart"></i>
                                        <input type="text" class="form-control" name="percentage" value="{{ old('percentage')?old('percentage'):0 }}" placeholder="Percentage" >
                                        @if ($errors->has('percentage'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('percentage') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Discount Amount</label>
                                <div class="col-md-6 {{ $errors->has('discount_amount') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="discount_amount" value="{{ old('discount_amount')?old('discount_amount'):0 }}" placeholder="Discount Amount/Percentage" >
                                        @if ($errors->has('discount_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('discount_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Reissue/Refund Charged</label>
                                <div class="col-md-6 {{ $errors->has('reissue_or_refund_charged') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control" name="reissue_or_refund_charged" value="{{ old('reissue_or_refund_charged')?old('reissue_or_refund_charged'):0 }}" placeholder="Reissue/Refund Charged" >
                                        @if ($errors->has('reissue_or_refund_charged'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('reissue_or_refund_charged') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Customer Charged</label>
                                <div class="col-md-6 {{ $errors->has('customer_charged') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="customer_charged" value="{{ old('customer_charged')?old('customer_charged'):0 }}" placeholder="Customer Charged" required>
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
                                        <input type="text" class="form-control" name="payable_amount" value="{{ old('payable_amount')?old('payable_amount'):0 }}" placeholder="Payable Amount" readonly >
                                        @if ($errors->has('payable_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('payable_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-md-3 control-label required">Actual Payable Amount</label>
                                <div class="col-md-6 {{ $errors->has('actual_payable_amount') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control" name="actual_payable_amount" value="{{ old('actual_payable_amount')?old('actual_payable_amount'):0 }}" placeholder="Actual Payable Amount" >
                                        @if ($errors->has('actual_payable_amount'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('actual_payable_amount') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div> --}}
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Agency</label>
                                <div class="col-md-6 {{ $errors->has('agency_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="agency_id" id="agency">
                                        <option value=""></option>
                                        @foreach ($allAgencies as $agencyId => $agencyName )
                                        <option value="{{ $agencyId }}" {{ (old('agency_id') == $agencyId) ? 'selected' : '' }} >
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
                                <div class="col-md-3">
                                    <a href="{{ route('agency_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Agency Payment</label>
                                <div class="col-md-6 {{ $errors->has('agency_payment') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-money"></i>
                                        <input type="text" class="form-control" name="agency_payment" value="{{ old('agency_payment') }}" placeholder="Agency Payment" >
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
                                        <input type="radio" name="issue_type" value="1" {{ old('issue_type') == 1 ? 'checked' : '' }}  > Individual </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="issue_type" value="2" {{ old('issue_type') == 2 ? 'checked' : '' }}  > Corporate </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Pax Type</label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="pax_type" value="1" {{ old('pax_type') == 1 ? 'checked' : '' }}  > Adult </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="pax_type" value="2" {{ old('pax_type') == 2 ? 'checked' : '' }}  > Child </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="pax_type" value="3" {{ old('pax_type') == 2 ? 'checked' : '' }}  > Infant </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ticket Image</label>
                                <div class="col-md-6 {{ $errors->has('ticket_image') ? 'has-error' : '' }}">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Reference's Name</label>
                                <div class="col-md-6 {{ $errors->has('reference_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="reference_id" id="reference">
                                        <option value=""></option>
                                        @foreach ($allCustomers as $customerId => $customerName )
                                        <option value="{{ $customerId }}" {{ (old('reference_id') == $customerId) ? 'selected' : '' }} >
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
                                <div class="col-md-3">
                                    <a href="{{ route('customer_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Staff's Name</label>
                                <div class="col-md-6 {{ $errors->has('staff_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="staff_id" id="staff">
                                        <option value=""></option>
                                        @foreach ($allUser as $userId => $userName )
                                        <option value="{{ $userId }}" {{ (old('staff_id') == $userId) ? 'selected' : '' }} >
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
                                <div class="col-md-3">
                                    <a href="{{ route('userinfo.create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Status</label>
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
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('booking') }}" class="btn default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
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

$('#airline').select2({
    placeholder: "select a airline",
    tags:true
});

$('#staff').select2({
    placeholder: "select a staff",
    tags:true
});

$('#currency').select2({
    placeholder: "select a currecy",
    tags:true
});

$(document).ready(function() {
    $('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        autoclose: true
    });

    $('input[name=base_fare]').on('keyup', function (){
        $('input[name=ait]').val(parseFloat($('input[name=base_fare]').val() * parseFloat($('input[name=ait_percentage]').val())));
        $('input[name=airlines_vat]').val(parseFloat(($('input[name=base_fare]').val() * .07) * .15));
        $('input[name=total_fare]').val(parseFloat($('input[name=base_fare]').val()) + parseFloat($('input[name=airlines_vat]').val()) + parseFloat($('input[name=ait]').val()) + parseFloat($('input[name=tax]').val()));
        if(isNaN($('input[name=total_fare]').val())){
            $('input[name=total_fare]').val(0);
        }
    });

    $('input[name=ait_percentage]').on('change', function (){
        if(parseFloat($('input[name=ait_percentage]').val()) >= 0){
            $('input[name=ait]').val(parseFloat($('input[name=base_fare]').val() * parseFloat($('input[name=ait_percentage]').val())));
            $('input[name=total_fare]').val(parseFloat($('input[name=base_fare]').val()) + parseFloat($('input[name=airlines_vat]').val()) + parseFloat($('input[name=ait]').val()) + parseFloat($('input[name=tax]').val()));
        }
        else{
            $('input[name=ait_percentage]').val(0.3);
            $('input[name=ait]').val(parseFloat($('input[name=base_fare]').val() * parseFloat($('input[name=ait_percentage]').val())));
            $('input[name=total_fare]').val(parseFloat($('input[name=base_fare]').val()) + parseFloat($('input[name=airlines_vat]').val()) + parseFloat($('input[name=ait]').val()) + parseFloat($('input[name=tax]').val()));
        }
    });

    $('input[name=tax]').on('keyup', function (){
        $('input[name=total_fare]').val(parseFloat($('input[name=base_fare]').val()) + parseFloat($('input[name=airlines_vat]').val()) + parseFloat($('input[name=ait]').val()) + parseFloat($('input[name=tax]').val()));
        if(isNaN($('input[name=total_fare]').val())){
            $('input[name=total_fare]').val(0);
        }
    });

    $('input[name=discount_amount]').on('keyup', function (){
        if($('input[name="discount_type"]:checked').val() == 1){
            $('input[name=payable_amount]').val(parseFloat($('input[name=total_fare]').val()) - parseFloat($('input[name=discount_amount]').val()));
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        }
        if(isNaN($('input[name=payable_amount]').val())){
            $('input[name=payable_amount]').val(0);
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        }
    });

    $('input[name="discount_type"]').on('change', function (){
        if($('input[name="discount_type"]:checked').val() == 1){
            $('.percentage').hide();
            // $('input[name=payable_amount]').val(parseFloat($('input[name=total_fare]').val()) - parseFloat($('input[name=discount_amount]').val()));
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        } else {
            $('.percentage').show();
            // $('input[name=discount_amount]').val(parseFloat($('input[name=total_fare]').val()) * parseFloat($('input[name=percentage]').val()));
            // $('input[name=payable_amount]').val(parseFloat($('input[name=total_fare]').val()) - parseFloat(parseFloat($('input[name=total_fare]').val()) * (parseFloat($('input[name=discount_amount]').val()) / 100)));
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        }
        if(isNaN($('input[name=payable_amount]').val())){
            $('input[name=payable_amount]').val(0);
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        }
    });

    $('input[name=percentage]').on('keyup', function (){
        if($('input[name="discount_type"]:checked').val() == 2){
            $('input[name=discount_amount]').val(parseFloat($('input[name=total_fare]').val()) * parseFloat($('input[name=percentage]').val())  / 100);
            $('input[name=payable_amount]').val(parseFloat($('input[name=total_fare]').val()) - parseFloat($('input[name=discount_amount]').val()));
        }
    });

    $('#airline').on('change', function (){
        if($(this).val() > 0){
            jQuery.ajax({
                type: "GET",
                url: 'get_ticket_code/' + $(this).val(),
                dataType: "HTML",
                success: function (data) {
                    console.log(data);
                    $('input[name="ticket_number"]').val(data);
                }
            });
        }
    });
});

</script>
@endsection
