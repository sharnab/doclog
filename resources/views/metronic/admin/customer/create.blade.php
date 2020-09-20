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
            <h1>Customer <small>New</small></h1>
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
            <a href="{{ url('admin/customer') }}">Customer</a>
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
                        <i class="fa fa-home"></i>Create New Customer
                    </div>
                    <a href="{{route('customer')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['route' => 'customer_store' , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Customer Type<i style="color: red">*</i></label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="type" value="1" {{ old('type') != 2 ? 'checked' : '' }}  > Personal </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="type" value="2" {{ old('type') == 2 ? 'checked' : '' }}  > Company </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group company_dropdown">
                                <label class="col-md-3 control-label required">Company</label>
                                <div class="col-md-6 {{ $errors->has('company_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="company_id" id="company">
                                        <option value=""></option>
                                        @foreach ($allCompanies as $companyId => $companyName )
                                        <option value="{{ $companyId }}" {{ (old('company_id') == $companyId) ? 'selected' : '' }} >
                                            {{ $companyName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('customer_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-1" style=" padding-left: 0">
                                    <a href="{{ route('company_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Full Name<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('sur_name') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="sur_name" value="{{ old('sur_name') }}" placeholder="Surname"  >
                                    @if ($errors->has('sur_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('sur_name') }}</strong>
                                    </span>
                                    @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Given name<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('given_name') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="given_name" value="{{ old('given_name') }}" placeholder="Given name"  >
                                        @if ($errors->has('given_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('given_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Contact No<i style="color: red">*</i></label>
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
                                <label class="col-md-3 control-label">National ID<i style="color: red">*</i></label>
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
                                <label class="col-md-3 control-label ">Nationality</label>
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
                                <div class="col-md-3">
                                    <a href="{{ route('country_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label ">Customer Type</label>
                                <div class="col-md-6 {{ $errors->has('customer_type_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="customer_type_id" id="customertype">
                                        <option value=""></option>
                                        @foreach ($allCustomerTypes as $customerTypeId => $customerTypeName )
                                        <option value="{{ $customerTypeId }}" {{ (old('customer_type_id') == $customerTypeId) ? 'selected' : '' }} >
                                            {{ $customerTypeName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('customer_type_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('customer_type_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('customertype.create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label ">Date OF Birth</label>
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
                                <label class="col-md-3 control-label ">Birth Place</label>
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
                                <label class="col-md-3 control-label">Passport No<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('passport_no') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="passport_no" value="{{ old('passport_no') }}" placeholder="Passport No"  >
                                        @if ($errors->has('passport_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('passport_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Passport Image<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('image') ? 'has-error' : '' }}">
                                    <input type="file" name="image" class="form-control">
                                    @if ($errors->has('image'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Previous Passport No</label>
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
                                <label class="col-md-3 control-label">Issuing Authority</label>
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
                                <label class="col-md-3 control-label">Emergency Personnel Name</label>
                                <div class="col-md-6 {{ $errors->has('emergency_name') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="emergency_name" value="{{ old('emergency_name') }}" placeholder="Emergency Personnel Name"  >
                                        @if ($errors->has('emergency_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('emergency_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Emergency Contact No</label>
                                <div class="col-md-6 {{ $errors->has('emergency_contact') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-phone-square"></i>
                                        <input type="text" class="form-control" name="emergency_contact" value="{{ old('emergency_contact') }}" placeholder="Emergency Personnel Contact No" maxlength="15"  >
                                        @if ($errors->has('emergency_contact'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('emergency_contact') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Emergency Personnel Relation</label>
                                <div class="col-md-6 {{ $errors->has('emergency_relation') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-group"></i>
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
                                <label class="col-md-3 control-label">Emergency Address</label>
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
                                <label class="col-md-3 control-label">Billing Address<i style="color: red">*</i></label>
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
                                <label class="col-md-3 control-label">Sales Executive</label>
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
                                <div class="col-md-3">
                                    <a href="{{ route('salesexecutive_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Issuing Date</label>
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
                                <label class="col-md-3 control-label">Expiry Date</label>
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
                                <label class="col-md-3 control-label">Is Active<i style="color: red">*</i></label>
                                <div>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="1" {{ (old('active_status') != 2)?'checked':'' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="2" {{ (old('active_status') == 2)?'checked':'' }}  > No </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('customer') }}" class="btn default">Cancel</a>
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

$( document ).ready(function() {
    $('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        autoclose: true
    });

    if($('input[name=type]:checked').val() == 1){
        $('.company_dropdown').hide();
    } else {
        $('.company_dropdown').show();
    }
});

$('input[name=type]').change(function(){
    if($('input[name=type]:checked').val() == 1){
        $('.company_dropdown').hide();
    } else {
        $('.company_dropdown').show();
    }
});

$('#company').select2({
    placeholder: "select a company",
    allowClear: true
});

$('#nationality').select2({
    placeholder: "select a nation",
    allowClear: true
});

$('#customertype').select2({
    placeholder: "select a customer type",
    tags:true
});

$('#sales_executive').select2({
    placeholder: "select a sales executive",
    tags:true
});

</script>
@endsection
