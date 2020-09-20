@extends('layouts.admin')
<link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Customer <small>Edit</small></h1>
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
                        <i class="fa fa-home"></i>Edit Customer
                    </div>
                    <a href="{{route('customer')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['url' => route( 'customer_update',$customer['id'] ) , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}
                        {{method_field('PUT')}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Type<i style="color: red">*</i></label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="type" value="1" {{ $customer['type'] == 1 ? 'checked' : '' }}  > Personal </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="type" value="2" {{ $customer['type'] == 2 ? 'checked' : '' }}  > Company </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group company_dropdown">
                                <label class="col-md-3 control-label required">Company</label>
                                <div class="col-md-6 {{ $errors->has('company') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="company_id" id="company">
                                        <option value=""></option>
                                        @foreach ($allCompanies as $companyId => $companyName )
                                        <option value="{{ $companyId }}"  {{ $customer['company_id'] == $companyId ? 'selected' : '' }}>
                                            {{ $companyName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('company_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('company_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-1" style="padding-left: 0">
                                    <a href="{{ route('company_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Full Name</label>
                                <div class="col-md-6 {{ $errors->has('sur_name') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="sur_name" value="{{ old('sur_name') ? old('sur_name') : $customer['sur_name'] }}" placeholder="Full Name" required>
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
                                        <input type="text" class="form-control" name="given_name" value="{{ old('given_name') ? old('given_name') : $customer['given_name'] }}" placeholder="Username" required>
                                        @if ($errors->has('given_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('given_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">National ID</label>
                                <div class="col-md-6 {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-credit-card "></i>
                                        <input type="text" class="form-control" name="contact_no" value="{{ old('contact_no') ? old('contact_no') : $customer['contact_no'] }}" placeholder="National ID" maxlength="17" >
                                        @if ($errors->has('contact_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Personal No</label>
                                <div class="col-md-6 {{ $errors->has('personal_no') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-phone-square"></i>
                                        <input type="text" class="form-control" name="personal_no" value="{{ old('personal_no') ? old('personal_no') : $customer['personal_no'] }}" placeholder="Personal No" maxlength="15" >
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
                                <div class="col-md-6 {{ $errors->has('nationality') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="nationality" id="nationality" >
                                        <option value="">Select Nation</option>
                                        @foreach ($allNations as $nationValue => $nationName )
                                        <option value="{{ $nationValue }}" {{ $customer['nationality'] == $nationValue ? 'selected' : '' }}>
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
                                <label class="col-md-3 control-label required">Customer Type</label>
                                <div class="col-md-6 {{ $errors->has('customertype') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="customer_type_id" id="customertype">
                                        <option value=""></option>
                                        @foreach ($allCustomerTypes as $customerTypeId => $customerTypeName )
                                        <option value="{{ $customerTypeId }}"  {{ $customer['customer_type_id'] == $customerTypeId ? 'selected' : '' }}>
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
                                <label class="col-md-3 control-label required">Date OF Birth</label>
                                <div class="col-md-6 {{ $errors->has('date_of_birth') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-calendar "></i>
                                        <input type="text" class="form-control datepicker" name="date_of_birth" value="{{ old('date_of_birth') ? old('date_of_birth') : date('d/m/Y', strtotime($customer['date_of_birth'])) }}" placeholder="dd-mm-yyyy" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" >
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
                                    <input type="text" class="form-control" name="place_of_birth" value="{{ old('place_of_birth') ? old('place_of_birth') : $customer['place_of_birth'] }}" placeholder="Birth Place" >
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
                                        <input type="text" class="form-control" name="passport_no" value="{{ old('passport_no') ? old('passport_no') : $customer['passport_no'] }}" placeholder="Passport No" required>
                                        @if ($errors->has('passport_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('passport_no') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Passport Image</label>
                                <div class="col-md-6 {{ $errors->has('image') ? 'has-error' : '' }}">
                                    @if ($customer['passport_image'])
                                        <img src="{{url($customer->passport_image)}}" height="100" />
                                        <button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                                    @else
                                        <input type="file" name="image" class="form-control">
                                        @if ($errors->has('image'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('image') }}</strong>
                                        </span>
                                        @endif
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Previous Passport No</label>
                                <div class="col-md-6 {{ $errors->has('previous_passport_no') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-phone-square"></i>
                                        <input type="text" class="form-control" name="previous_passport_no" value="{{ old('previous_passport_no') ? old('previous_passport_no') : $customer['previous_passport_no'] }}" placeholder="Previous Passport No" >
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
                                        <input type="text" class="form-control" name="issuing_authority" value="{{ old('issuing_authority') ? old('issuing_authority') : $customer['issuing_authority'] }}" placeholder="Issuing Authority" >
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
                                        <input type="text" class="form-control" name="emergency_name" value="{{ old('emergency_name') ? old('emergency_name') : $customer['emergency_name'] }}" placeholder="Emergency Personnel Name" required>
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
                                        <input type="text" class="form-control" name="emergency_contact" value="{{ old('emergency_contact') ? old('emergency_contact') : $customer['emergency_contact'] }}" placeholder="Emergency Personnel Contact No" maxlength="15" required>
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
                                        <i class="fa fa-group"></i>
                                        <input type="text" class="form-control" name="emergency_relation" value="{{ old('emergency_relation') ? old('emergency_relation') : $customer['emergency_relation'] }}" placeholder="Relation with Emergency Personnel" >
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
                                        <textarea class="form-control" name="emergency_address" placeholder="Emergency Personnel Address" >{{ old('emergency_address') ? old('emergency_address') : $customer['emergency_address'] }}</textarea>
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
                                        <textarea class="form-control" name="billing_address" placeholder="Billing Address" >{{ old('billing_address') ? old('billing_address') : $customer['billing_address'] }}</textarea>
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
                                        <option value="{{ $salesExecutiveId }}" {{ $customer['sales_executive_id'] == $salesExecutiveId ? 'selected' : '' }}>
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
                                <label class="col-md-3 control-label required">Issuing Date</label>
                                <div class="col-md-6 {{ $errors->has('date_of_issue') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-calendar "></i>
                                        <input type="text" class="form-control datepicker" name="date_of_issue" value="{{ old('date_of_issue') ? old('date_of_issue') : date('d/m/Y', strtotime($customer['date_of_issue'])) }}" placeholder="dd-mm-yyyy" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" >
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
                                        <input type="text" class="form-control datepicker" name="date_of_expire" value="{{ old('date_of_expire') ? old('date_of_expire') : date('d/m/Y', strtotime($customer['date_of_expire'])) }}" placeholder="dd-mm-yyyy" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years" id="datapicker" >
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
                                        <input type="radio" name="active_status" value="1" {{ $customer['active_status'] == 1 ? 'checked' : '' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="2" {{ $customer['active_status'] == 2 ? 'checked' : '' }}  > No </label>
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
