BANGLA TRAC PSD
 Repositories

 mahedi

 Sign Out
create.blade.php
 Details

 Repository Browser

 Commits

 Download

 Clone
Home / resources / views / metronic / admin / passenger / create.blade.php

527 lines | 34.549 kB Blame History Raw Download
@extends('layouts.admin')
@section('extra_css')

<style type="text/css">
    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }
</style>
<link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
<link href="/assets/admin/layout/css/star-rating-svg.css" rel="stylesheet">
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
<script src="{{asset('/admin/layout/scripts/jquery.star-rating-svg.js')}}" type="text/javascript"></script>
@endsection

@section('content')
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Passenger <small>New</small></h1>
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
            <a href="{{ url('admin/passenger') }}">Passenger</a>
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
                        <i class="fa fa-home"></i>Create New Passenger
                    </div>
                    <a href="{{route('passenger')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['route' => 'passenger_store' , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Customer</label>
                                <div class="col-md-6 {{ $errors->has('customer_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="customer_id" id="customer">
                                        <option value=""></option>
                                        @foreach ($allCustomers as $customerId => $customerName )
                                        <option value="{{ $customerId }}" {{ (old('customer_id') == $customerId) ? 'selected' : '' }} >
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
                                <div class="col-md-1" style=" padding-left: 0">
                                    <a href="{{ route('customer_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
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
                                <label class="col-md-3 control-label required">Surname<i style="color: red">*</i></label>
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
                                <label class="col-md-3 control-label required">Given name<i style="color: red">*</i></label>
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
                                <label class="col-md-3 control-label required">Contact No<i style="color: red">*</i></label>
                                <div class="col-md-9 {{ $errors->has('contact_no') ? 'has-error' : '' }}" style="padding-left: 8px">
                                    <table class="table" id="dynamicTable" style="border-top: 0px">
                                        <tr style="border-top: 0px">
                                            <td style="border-top: 0px"><input type="text" name="contact_no[0]" placeholder="Enter your contact number" class="form-control col-md-9" /></td>
                                            <td style="border-top: 0px"><button type="button" name="add" id="add" class="btn btn-success col-md-3" style="width: 40%">Add More</button></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            {{-- <div class="form-group">
                                <label class="col-md-3 control-label required">Contact No<i style="color: red">*</i></label>
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
                            </div> --}}
                            <div class="form-group">
                                <label class="col-md-3 control-label required">National ID<i style="color: red">*</i></label>
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
                                <div class="form-group">
                                    <div class="col-md-2 {{ $errors->has('nid_img') ? 'has-error' : '' }}">
                                        <input type="file" name="nid_img">
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
                                <div class="col-md-6 {{ $errors->has('nationality') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="nationality" id="nationality" >
                                        <option value="">Select Nation</option>
                                        @foreach ($allNations as $nationValue => $nationName )
                                        <option value="{{ $nationValue }}" {{ (old('nationality') == $nationValue) || ($nationValue == 'Bangladesh') ? 'selected' : '' }} >
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
                                <div class="col-md-1" style=" padding-left: 0">
                                    <a href="{{ route('country_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
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
                            <div class="form-group" style="margin-bottom: 0px;">
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
                            <div class="form-group" style="padding-left: 2%">
                                <button type="button" name="add_passport" id="add_passport" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right" style="margin-bottom: 1%;margin-right: 2%;">Add More</button>
                                {{-- <a href="" title="Add New" id="add_passport" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right" style="margin-bottom: 1%;margin-right: 2%;" > <i class="ion-plus-circled"></i> </a> --}}
                                <table class="table-striped table-hover" id="passportTable" style="width: 98%; padding-left: 2%">
                                    <tr>
                                        <td class="text-center">Passport Number</td>
                                        <td class="text-center">Passport Image</td>
                                        <td class="text-center">Issuing Authority</td>
                                        <td class="text-center">Issue Date</td>
                                        <td class="text-center">Expiry Date</td>
                                        <td class="text-center">Is Default</td>
                                    </tr>
                                    <tr>
                                        <td class="col-md-3 {{ $errors->has('passport_no[0]') ? 'has-error' : '' }}" style="padding: 0px;padding-left: 15px">
                                            <input type="text" class="form-control" name="passport_no[0]" value="{{ old('passport_no[0]') }}" placeholder="Passport No" required>
                                        </td>
                                        <td class="col-md-2 {{ $errors->has('passport_image[0]') ? 'has-error' : '' }}">
                                            <input type="file" name="passport_image[0]">
                                        </td>
                                        <td class="col-md-3 {{ $errors->has('issuing_authority[0]') ? 'has-error' : '' }}" style="padding: 0px;padding-right: 15px">
                                            <input type="text" class="form-control" name="issuing_authority[0]" value="{{ old('issuing_authority[0]') }}" placeholder="Issuing Authority" >
                                        </td>
                                        <td class="col-md-2 {{ $errors->has('issuing_date[0]') ? 'has-error' : '' }}" style="padding: 0px;padding-right: 15px">
                                            <input type="text" class="form-control datepicker" name="issuing_date[0]" value="{{ old('issuing_date[0]') }}" placeholder="Issue Date" >
                                        </td>
                                        <td class="col-md-2 {{ $errors->has('expiry_date[0]') ? 'has-error' : '' }}" style="padding: 0px;padding-right: 15px">
                                            <input type="text" class="form-control datepicker" name="expiry_date[0]" value="{{ old('expiry_date[0]') }}" placeholder="Expiry Date" >
                                        </td>
                                        <td class="col-md-2 {{ $errors->has('currently_active[0]') ? 'has-error' : '' }}" style="padding: 0px;padding-left: 20px;padding-right: 15px">
                                            <input type="checkbox" class="form-control" name="currently_active[0]" value="1">
                                        </td>
                                    </tr>
                                </table>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label required">Driving License No</label>
                                <div class="col-md-6 {{ $errors->has('driver_license_no') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-credit-card"></i>
                                        <input type="text" class="form-control" name="driver_license_no" value="{{ old('driver_license_no') }}" placeholder="Driving License No" maxlength="15">
                                        @if ($errors->has('driver_license_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('driver_license_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2 {{ $errors->has('driver_license_img') ? 'has-error' : '' }}">
                                        <input type="file" name="driver_license_img">
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
                                        <textarea class="form-control" name="emergency_address" placeholder="Emergency Personnel Address" >{{ old('emergency_address') }}</textarea>
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
                                        <textarea class="form-control" name="billing_address" placeholder="Billing Address" >{{ old('billing_address') }}</textarea>
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
                                        <option value="{{ $salesExecutiveId }}" {{ (old('sales_executive_id') == $salesExecutiveId) ? 'selected' : '' }} >
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
                                <div class="col-md-1" style="padding-left: 0">
                                    <a href="{{ route('salesexecutive_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
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
                                <label class="col-md-3 control-label">Status<i style="color: red">*</i></label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="1" {{ old('active_status') != 2 ? 'checked' : '' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="2" {{ old('active_status') == 2 ? 'checked' : '' }}  > No </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Remarks</label>
                                <div class="col-md-6 {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-envelope-o"></i>
                                        <textarea class="form-control" name="remarks" placeholder="Remarks" >{{ old('remarks') ? old('remarks') : '' }}</textarea>
                                        @if ($errors->has('remarks'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('remarks') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('passenger') }}" class="btn default">Cancel</a>
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
{{-- href="star-rating-svg.css"> --}}


<script type="text/javascript">

// $(".my-rating").starRating({
//   initialRating: 4,
//   strokeColor: '#894A00',
//   strokeWidth: 10,
//   starSize: 25
// });

$( document ).ready(function() {
    $('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        autoclose: true
    });
});

$('#nationality').select2({
    placeholder: "select a nation",
    allowClear: true
});

$('#customer').select2({
    placeholder: "select a customer",
    tags:true
});

$('#sales_executive').select2({
    placeholder: "select a sales executive",
    tags:true
});

var i = 0;

$("#add").click(function(){
    ++i;
    $("#dynamicTable").append('<tr style="border-top: 0px"><td style="border-top: 0px"><input type="text" name="contact_no['+i+']" placeholder="Enter your contact number" class="form-control" /></td><td style="border-top: 0px"><button type="button" class="btn btn-danger remove-tr">Remove</button></td></tr>');
});

$("#add_passport").click(function(){
    ++i;
    $("#passportTable").append(
    '<tr><td class="col-md-3" style="padding: 0px;padding-left: 15px"><input type="text" class="form-control" name="passport_no['+i+']" placeholder="Passport No"></td>'+
    '<td class="col-md-2" style="padding: 0px;padding-right: 15px;"><input style="border: 0px;" type="file" class="form-control" name="passport_image['+i+']" ></td>'+
    '<td class="col-md-3" style="padding: 0px;padding-right: 15px"><input type="text" class="form-control" name="issuing_authority['+i+']" placeholder="Issuing Authority"></td>'+
    '<td class="col-md-2" style="padding: 0px;padding-right: 15px"><input type="text" class="form-control datepicker" name="issuing_date['+i+']" placeholder="Issue Date"></td>'+
    '<td class="col-md-2" style="padding: 0px;padding-right: 15px"><input type="text" class="form-control datepicker" name="expiry_date['+i+']" placeholder="Expiry Date"></td>'+
    '<td class="col-md-2" style="padding: 0px;padding-left: 20px;padding-right: 15px"><input type="checkbox" class="form-control" name="currently_active['+i+']" value="1"></td></tr>'
);
});
// padding: 0px;padding-left: 15px
// padding: 0px;padding-right: 15px
// padding: 0px;padding-right: 15px
// padding: 0px;padding-right: 15px


$(document).on('click', '.remove-tr', function(){
     $(this).parents('tr').remove();
});

</script>
@endsection
BTRAC PSD Git Server © 2015
