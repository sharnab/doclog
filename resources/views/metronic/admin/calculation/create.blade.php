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
            <h1>Calculation <small>New</small></h1>
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
            <a href="{{ url('admin/cost_calculation') }}">Cost Calculation</a>
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
{{--                <div class="portlet-title">--}}
{{--                    <div class="caption">--}}
{{--                        <i class="fa fa-home"></i>Create New Booking--}}
{{--                    </div>--}}
{{--                    <a href="{{route('booking')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>--}}
{{--                </div>--}}
                <div class="portlet-body">
                    @include('layouts.alert')
{{--                    {{ Form::open(['route' => 'booking_store' , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}--}}
                   <div class="form-horizontal">
                        <div class="form-body;" style="padding-left: 20px; padding-top: 20px">
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Currency</label>
                                <div class="col-md-6 {{ $errors->has('currency_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="currency_id" id="currency">
                                        <option value="">Select Currency</option>
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
                                <label class="col-md-3 control-label required">Airline</label>
                                <div class="col-md-6 {{ $errors->has('airline_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="airlines_id" id="airline">
                                        <option value="">Select Airlines</option>
                                        @foreach ($allAirlines as $airlineId => $airlineName )
                                        <option value="{{ $airlineId }}" {{ (old('airlines_id') == $airlineId) ? 'selected' : '' }} >
                                            {{ $airlineName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('airline_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('airline_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('airline_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="row" style="background-color: lightslategray; margin: 5px 3px;">
                                <div class="col-md-6 ">
                                    <div class="form-group">
                                        <label class="control-label col-md-4">Actual</label>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <label class="control-label col-md-6">For Customer</label>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Ticket Base Fare</label>
                                        <div class="col-md-6 {{ $errors->has('ticket_base_fare') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="ticket_base_fare" value="{{ old('ticket_base_fare')?old('ticket_base_fare'):0 }}" placeholder="Ticket Base Fare" required>
                                                @if ($errors->has('ticket_base_fare'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('ticket_base_fare') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Ticket Base Fare</label>
                                        <div class="col-md-6 {{ $errors->has('cs_ticket_base_fare') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="cs_ticket_base_fare" value="{{ old('cs_ticket_base_fare')?old('cs_ticket_base_fare'):0 }}" placeholder="Ticket Base Number" required>
                                                @if ($errors->has('cs_ticket_base_fare'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('cs_ticket_base_fare') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>
                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Revalidation Charge</label>
                                        <div class="col-md-6 {{ $errors->has('revalidation_charge') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="revalidation_charge" value="{{ old('revalidation_charge')?old('revalidation_charge'):0 }}" placeholder="Revalidation Charge" required>
                                                @if ($errors->has('revalidation_charge'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('revalidation_charge') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Revalidation Charge</label>
                                        <div class="col-md-6 {{ $errors->has('cs_revalidation_charge') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="cs_revalidation_charge" value="{{ old('cs_revalidation_charge')?old('cs_revalidation_charge'):0 }}" placeholder="Revalidation Charge" required>
                                                @if ($errors->has('cs_revalidation_charge'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('cs_revalidation_charge') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <!--/row-->
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Refund Charge</label>
                                        <div class="col-md-6 {{ $errors->has('refund_charge') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="refund_charge" value="{{ old('refund_charge')?old('refund_charge'):0 }}" placeholder="Refund Charge" required>
                                                @if ($errors->has('refund_charge'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('refund_charge') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Refund Charge</label>
                                        <div class="col-md-6 {{ $errors->has('cs_refund_charge') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="cs_refund_charge" value="{{ old('cs_refund_charge')?old('cs_refund_charge'):0 }}" placeholder="Refund Charge" required>
                                                @if ($errors->has('cs_refund_charge'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('cs_refund_charge') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Refund Amount</label>
                                        <div class="col-md-6 {{ $errors->has('refund_amount') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="refund_amount" value="{{ old('refund_amount')?old('refund_amount'):0 }}" placeholder="Refund Amount" required>
                                                @if ($errors->has('refund_amount'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('refund_amount') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Refund Amount</label>
                                        <div class="col-md-6 {{ $errors->has('cs_refund_amount') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="cs_refund_amount" value="{{ old('cs_refund_amount')?old('cs_refund_amount'):0 }}" placeholder="Refund Amount" required>
                                                @if ($errors->has('cs_refund_amount'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('cs_refund_amount') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">XT & All Other Taxes</label>
                                        <div class="col-md-6 {{ $errors->has('xt_taxes') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="xt_taxes" value="{{ old('xt_taxes')?old('xt_taxes'):0 }}" placeholder="XT & All Other Taxes" required>
                                                @if ($errors->has('xt_taxes'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('xt_taxes') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">XT & All Other Taxes</label>
                                        <div class="col-md-6 {{ $errors->has('cs_xt_taxes') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="cs_xt_taxes" value="{{ old('cs_xt_taxes')?old('cs_xt_taxes'):0 }}" placeholder="XT & All Other Taxes" required>
                                                @if ($errors->has('cs_xt_taxes'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('cs_xt_taxes') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">AIT</label>
                                        <div class="col-md-2 {{ $errors->has('ait_percentage') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="ait_percentage" value="{{ old('ait_percentage')?old('ait_percentage'):'0.3' }}" placeholder="AIT" required>
                                                @if ($errors->has('ait_percentage'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('ait_percentage') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 {{ $errors->has('ait') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" name="ait" value="{{ old('ait')?old('ait'):'0' }}" placeholder="AIT" required>
                                                @if ($errors->has('ait'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('ait') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">AIT</label>
                                        <div class="col-md-2 {{ $errors->has('cs_ait_percentage') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="cs_ait_percentage" value="{{ old('cs_ait_percentage')?old('cs_ait_percentage'):'0.3' }}" placeholder="AIT" required >
                                                @if ($errors->has('cs_ait_percentage'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('cs_ait_percentage') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 {{ $errors->has('cs_ait') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" name="cs_ait" value="{{ old('cs_ait')?old('cs_ait'):'0' }}" placeholder="AIT" required >
                                                @if ($errors->has('cs_ait'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('cs_ait') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">VAT</label>
                                        <div class="col-md-2 {{ $errors->has('vat_percentage') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="vat_percentage" value="{{ old('vat_percentage')?old('vat_percentage'):'15' }}" placeholder="VAT" required>
                                                @if ($errors->has('vat_percentage'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('vat_percentage') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 {{ $errors->has('vat') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" name="vat" value="{{ old('vat')?old('vat'):'0' }}" placeholder="VAT" required>
                                                @if ($errors->has('vat'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('vat') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">VAT</label>
                                        <div class="col-md-2 {{ $errors->has('cs_vat_percentage') ? 'has-error' : '' }}">
                                            <div>
                                                <input type="text" class="form-control" name="cs_vat_percentage" value="{{ old('cs_vat_percentage')?old('cs_vat_percentage'):'15' }}" placeholder="VAT" required >
                                                @if ($errors->has('cs_vat_percentage'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('cs_vat_percentage') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col-md-4 {{ $errors->has('cs_vat') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <input type="text" class="form-control" name="cs_vat" value="{{ old('cs_vat')?old('cs_vat'):'0' }}" placeholder="VAT" required >
                                                @if ($errors->has('cs_vat'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('cs_vat') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Commission From Airlines</label>
                                        <div class="col-md-2 {{ $errors->has('airlines_com_1') ? 'has-error' : '' }}">
                                            <div class="input-icon" style="width: 65px">
                                                <input type="text" style="padding-left: 15px;width: 80%;" class="form-control" name="airlines_com_1" value="{{ old('airlines_com_1')?old('airlines_com_1'):0 }}" placeholder="Commission From Airlines" required>
                                                @if ($errors->has('airlines_com_1'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('airlines_com_1') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-md-1" style="width: 0px;padding: 0px;text-align: center;font-size: 18px;margin-top: 5px;">+</label>
                                        <div class="col-md-2 {{ $errors->has('airlines_com_2') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <input type="text" style="padding-left: 19px" class="form-control" name="airlines_com_2" value="{{ old('airlines_com_2')?old('airlines_com_2'):0 }}" placeholder="Commission From Airlines" required>
                                                @if ($errors->has('airlines_com_2'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('airlines_com_2') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                        <label class="col-md-1" style="width: 0px;padding: 0px;text-align: center;font-size: 18px;margin-top: 5px;">=</label>
                                        <div class="col-md-3 {{ $errors->has('airlines_com_total') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <input type="text" style="padding-left: 19px" class="form-control" name="airlines_com_total" value="{{ old('airlines_com_total')?old('airlines_com_total'):0 }}" placeholder="Commission From Airlines" readonly>
                                                @if ($errors->has('airlines_com_total'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('airlines_com_total') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Commission From Airlines</label>
                                        <div class="col-md-6 {{ $errors->has('cs_airlines_com') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="cs_airlines_com" value="{{ old('cs_airlines_com')?old('cs_airlines_com'):0 }}" placeholder="Commission From Airlines" required>
                                                @if ($errors->has('cs_airlines_com'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('cs_airlines_com') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Personal Commission</label>
                                            <div class="col-md-2 {{ $errors->has('personal_commission') ? 'has-error' : '' }}">
                                                <div>
                                                    <input type="text" class="form-control" name="personal_percentage" value="{{ old('personal_percentage')?old('personal_percentage'):'15' }}" placeholder="VAT" required >
                                                    @if ($errors->has('personal_percentage'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('personal_percentage') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col-md-4 {{ $errors->has('personal_amount') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <input type="text" class="form-control" name="personal_amount" value="{{ old('personal_amount')?old('personal_amount'):'0' }}" placeholder="Personal Commission" required >
                                                    @if ($errors->has('personal_amount'))
                                                        <span class="help-block">
                                                            <strong>{{ $errors->first('personal_amount') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            {{-- <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="personal_commission" value="{{ old('personal_commission')?old('personal_commission'):0 }}" placeholder="Personal Commission" required>
                                                @if ($errors->has('personal_commission'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('personal_commission') }}</strong>
                                        </span>
                                                @endif
                                            </div> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label required">Payment</label>
                                            <div class="col-md-6 {{ $errors->has('payment_id') ? 'has-error' : '' }}">
                                                <select class="form-control select2" name="airlines_id" id="airline">
                                                    <option value="">Select Payment Type</option>
                                                    <option value="1">Cash</option>
                                                    <option value="2">Bank</option>
                                                    <option value="3">Card</option>
                                                    <option value="4">Mobile</option>
                                                </select>

                                                @if ($errors->has('payment_id'))
                                                <span class="help-block has-error">
                                                    <strong>{{ $errors->first('payment_id') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label required">Include Charges</label>
                                            <div class="col-md-6 {{ $errors->has('included_charge') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" name="included_charge" value="{{ old('included_charge')?old('included_charge'):0 }}" placeholder="Include Charge">
                                                    @if ($errors->has('included_charge'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('included_charge') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">

                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="col-md-5 control-label required">Discount</label>
                                            <div class="col-md-6 {{ $errors->has('discount') ? 'has-error' : '' }}">
                                                <div class="input-icon">
                                                    <i class="fa fa-user"></i>
                                                    <input type="text" class="form-control" name="discount" value="{{ old('discount') }}" placeholder="Discount">
                                                    @if ($errors->has('discount'))
                                                        <span class="help-block">
                                                <strong>{{ $errors->first('discount') }}</strong>
                                            </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Total Charge</label>
                                        <div class="col-md-6 {{ $errors->has('total_charge') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="total_charge" value="{{ old('total_charge') }}" placeholder="Total Charge" readonly>
                                                @if ($errors->has('total_charge'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('total_charge') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="col-md-5 control-label required">Total Charge</label>
                                        <div class="col-md-6 {{ $errors->has('cs_total_charge') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="cs_total_charge" value="{{ old('cs_total_charge') }}" placeholder="Total Charge" readonly>
                                                @if ($errors->has('cs_total_charge'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('cs_total_charge') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!--/span-->
                            </div>

                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-3">
                                    <button class="btn green calculate">Calculate</button>
                                    <button type="reset" class="btn red reset">Reset</button>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="col-md-6 {{ $errors->has('actual_customer_figure') ? 'has-error' : '' }}">
                                            <div class="input-icon">
                                                <i class="fa fa-user"></i>
                                                <input type="text" class="form-control" name="actual_customer_figure" id="actual_customer_figure" value="{{ old('actual_customer_figure') }}" placeholder="Actual Customer Figure" readonly>
                                                @if ($errors->has('actual_customer_figure'))
                                                    <span class="help-block">
                                            <strong>{{ $errors->first('actual_customer_figure') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
{{--                    {{ Form::close() }}--}}
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

    $('#airline').on('change', function (){
        if($(this).val() > 0){
            jQuery.ajax({
                type: "GET",
                url: 'get_commssion/' + $(this).val(),
                dataType: "JSON",
                success: function (data) {
                    $('input[name="airlines_com_1"]').val(data.commission_1);
                    $('input[name="airlines_com_2"]').val(data.commission_2);
                }
            });
        }
    });
    $("input[name=ticket_base_fare]").on('change', function (){
        if(parseFloat($("input[name=ticket_base_fare]").val()) >= 0 ){
            $("input[name=cs_ticket_base_fare]").val($("input[name=ticket_base_fare]").val());
            if(parseFloat($("input[name=ait_percentage]").val()) >= 0){
                $("input[name=ait]").val($("input[name=ticket_base_fare]").val() * $("input[name=ait_percentage]").val());
                $("input[name=cs_ait]").val($("input[name=cs_ticket_base_fare]").val() * $("input[name=cs_ait_percentage]").val());
            }
            commission_calculation();
        }
        else{
            $("input[name=ticket_base_fare]").val(0);
            $("input[name=cs_ticket_base_fare]").val(0);
        }
    });
    $("input[name=revalidation_charge]").on('change', function (){
        if(isNaN(parseFloat($("input[name=revalidation_charge]").val())) == true){
            $("input[name=revalidation_charge]").val(0);
        }
    });
    $("input[name=refund_charge]").on('change', function (){
        if(isNaN(parseFloat($("input[name=refund_charge]").val())) == true){
            $("input[name=refund_charge]").val(0);
        }
    });
    $("input[name=refund_amount]").on('change', function (){
        if(isNaN(parseFloat($("input[name=refund_amount]").val())) == true){
            $("input[name=refund_amount]").val(0);
        }
    });
    $("input[name=xt_taxes]").on('change', function (){
        if(isNaN(parseFloat($("input[name=xt_taxes]").val())) == true){
            $("input[name=xt_taxes]").val(0);
        }
    });

    $("input[name=ait_percentage]").on('change', function (){
        if(parseFloat($("input[name=ait_percentage]").val()) >= 0){
            $("input[name=ait]").val($("input[name=ticket_base_fare]").val() * $("input[name=ait_percentage]").val());
        }
        else{
            $("input[name=ait]").val(0.3);
            $("input[name=ait]").val($("input[name=ticket_base_fare]").val() * $("input[name=ait_percentage]").val());
        }
    });

    $("input[name=ait]").on('change', function (){
        if(isNaN(parseFloat($("input[name=ait]").val())) == true){
            $("input[name=ait]").val(0);
        }
    });

    $("input[name=airlines_com_1]").on('change', function (){
        if(isNaN(parseFloat($("input[name=airlines_com_1]").val())) == true){
            $("input[name=airlines_com_1]").val(0);
        }
        commission_calculation();
    });
    $("input[name=airlines_com_2]").on('change', function (){
        if(isNaN(parseFloat($("input[name=airlines_com_2]").val())) == true){
            $("input[name=airlines_com_2]").val(0);
        }
        commission_calculation();
    });
    $("input[name=personal_commission]").on('change', function (){
        if(isNaN(parseFloat($("input[name=personal_commission]").val())) == true){
            $("input[name=personal_commission]").val(0);
        }
    });



    $("input[name=cs_ticket_base_fare]").on('change', function (){
        if(parseFloat($("input[name=cs_ticket_base_fare]").val()) >= 0){
            if(parseFloat($("input[name=cs_ait_percentage]").val()) >= 0){
                $("input[name=cs_ait]").val($("input[name=cs_ticket_base_fare]").val() * $("input[name=cs_ait_percentage]").val());
            }
        }
        else{
            $("input[name=cs_ticket_base_fare]").val(0);
        }
    });
    $("input[name=cs_revalidation_charge]").on('change', function (){
        if(isNaN(parseFloat($("input[name=cs_revalidation_charge]").val())) == true){
            $("input[name=cs_revalidation_charge]").val(0);
        }
    });
    $("input[name=cs_refund_charge]").on('change', function (){
        if(isNaN(parseFloat($("input[name=cs_refund_charge]").val())) == true){
            $("input[name=cs_refund_charge]").val(0);
        }
    });
    $("input[name=cs_refund_amount]").on('change', function (){
        if(isNaN(parseFloat($("input[name=cs_refund_amount]").val())) == true){
            $("input[name=cs_refund_amount]").val(0);
        }
    });
    $("input[name=cs_xt_taxes]").on('change', function (){
        if(isNaN(parseFloat($("input[name=cs_xt_taxes]").val())) == true){
            $("input[name=cs_xt_taxes]").val(0);
        }
    });


    $("input[name=cs_ait_percentage]").on('change', function (){
        if(parseFloat($("input[name=cs_ait_percentage]").val()) >= 0){
            $("input[name=cs_ait]").val($("input[name=cs_ticket_base_fare]").val() * $("input[name=cs_ait_percentage]").val());
        }
        else{
            $("input[name=cs_ait_percentage]").val(0.3);
            $("input[name=cs_ait]").val($("input[name=cs_ticket_base_fare]").val() * $("input[name=cs_ait_percentage]").val());
        }
    });

    $("input[name=cs_ait]").on('change', function (){
        if(isNaN(parseFloat($("input[name=cs_ait]").val())) == true){
            $("input[name=cs_ait]").val(0);
        }
    });

    $("input[name=cs_airlines_com]").on('change', function (){
        if(isNaN(parseFloat($("input[name=cs_airlines_com]").val())) == true){
            $("input[name=cs_airlines_com]").val(0);
        }
    });


    $(document).on("click", ".calculate", function(e){
        ticket_base_fare        = $("input[name=ticket_base_fare]").val();
        revalidation_charge     = $("input[name=revalidation_charge]").val();
        refund_charge           = $("input[name=refund_charge]").val();
        refund_amount           = $("input[name=refund_amount]").val();
        xt_taxes                = $("input[name=xt_taxes]").val();
        ait                     = $("input[name=ait]").val();
        airlines_com_1          = $("input[name=airlines_com_1]").val();
        airlines_com_2          = $("input[name=airlines_com_2]").val();
        personal_amount         = $("input[name=personal_amount]").val();

        first_com_value         = parseFloat(ticket_base_fare) * (parseFloat(airlines_com_1)/100);
        commission_amount       = parseFloat(ticket_base_fare) - first_com_value;
        second_com_value        = parseFloat(first_com_value) * (parseFloat(airlines_com_2)/100);

        alert(ticket_base_fare);
        alert(revalidation_charge);
        alert(refund_charge);
        alert(refund_amount);
        alert(xt_taxes);
        alert(ait);
        alert(personal_amount);
        {{-- total charge calculation --}}
        $('input[name="airlines_com_total"]').val(parseFloat(commission_amount) - parseFloat(second_com_value));
        $("input[name=total_charge]").val(parseFloat(ticket_base_fare) + parseFloat(revalidation_charge) + parseFloat(refund_charge) + parseFloat(refund_amount) + parseFloat(xt_taxes) + parseFloat(ait) + parseFloat(personal_amount) + parseFloat($('input[name="airlines_com_total"]').val()));

        cs_ticket_base_fare     = $("input[name=cs_ticket_base_fare]").val();
        cs_revalidation_charge  = $("input[name=cs_revalidation_charge]").val();
        cs_refund_charge        = $("input[name=cs_refund_charge]").val();
        cs_refund_amount        = $("input[name=cs_refund_amount]").val();
        cs_xt_taxes             = $("input[name=cs_xt_taxes]").val();
        cs_ait                  = $("input[name=cs_ait]").val();
        cs_airlines_com         = $("input[name=cs_airlines_com]").val();

        total_cost = parseFloat(cs_ticket_base_fare) + parseFloat(cs_revalidation_charge) + parseFloat(cs_refund_charge) + parseFloat(cs_refund_amount) + parseFloat(cs_xt_taxes) + parseFloat(cs_ait) + parseFloat(cs_airlines_com);

        cs_discount_amount = parseFloat(total_cost) * (parseFloat($("input[name=discount]").val())/100);

        {{-- customers total charge calculation --}}
        alert(total_cost);
        alert(cs_discount_amount);
        $("input[name=cs_total_charge]").val(parseFloat(total_cost) - parseFloat(cs_discount_amount));

        $("input[name=actual_customer_figure]").val(parseFloat($("input[name=total_charge]").val()) - parseFloat($("input[name=cs_total_charge]").val()));
        if($("input[name=actual_customer_figure]").val() < 0) {
            document.getElementById("actual_customer_figure").style.backgroundColor = "red";
        }
        else {
            document.getElementById("actual_customer_figure").style.backgroundColor = "green";
        }

    });

    $(document).on("click", ".reset", function(e){
        $("input[name=ticket_base_fare]").val(0);
        $("input[name=revalidation_charge]").val(0);
        $("input[name=refund_charge]").val(0);
        $("input[name=refund_amount]").val(0);
        $("input[name=xt_taxes]").val(0);
        $("input[name=ait_percentage]").val(0.3);
        $("input[name=ait]").val(0);
        $("input[name=airlines_com]").val(0);
        $("input[name=personal_commission]").val(0);
        $("input[name=total_charge]").val(0);

        $("input[name=cs_ticket_base_fare]").val(0);
        $("input[name=cs_revalidation_charge]").val(0);
        $("input[name=cs_refund_charge]").val(0);
        $("input[name=cs_refund_amount]").val(0);
        $("input[name=cs_xt_taxes]").val(0);
        $("input[name=cs_ait_percentage]").val(0.3);
        $("input[name=cs_ait]").val(0);
        $("input[name=cs_airlines_com]").val(0);

        {{-- customers total charge calculation --}}
        $("input[name=cs_total_charge]").val(0);

    });

    function commission_calculation(){
        ticket_base_fare        = $("input[name=ticket_base_fare]").val();
        airlines_com_1          = $("input[name=airlines_com_1]").val();
        airlines_com_2          = $("input[name=airlines_com_2]").val();
        first_com_value         = parseFloat(ticket_base_fare) * (parseFloat(airlines_com_1)/100);
        commission_amount       = parseFloat(ticket_base_fare) - first_com_value;
        second_com_value        = parseFloat(commission_amount) * (parseFloat(airlines_com_2)/100);

        $('input[name="airlines_com_total"]').val(parseFloat(commission_amount) - parseFloat(second_com_value));
        $('input[name="cs_airlines_com"]').val(parseFloat(commission_amount) - parseFloat(second_com_value));
    }

</script>
@endsection
