@extends('layouts.admin')
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Airline <small>Edit</small></h1>
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
            <a href="{{ url('admin/airline') }}">Airline</a>
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
                        <i class="fa fa-home"></i>Edit Airline
                    </div>
                    <a href="{{route('airline')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['url' => route( 'airline_update',$airline['id'] ) , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}
                        {{method_field('PUT')}}
                        <div class="form-body">
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Name</label>
                                <div class="col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $airline['name'] }}" placeholder="Name" required>
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Type</label>
                                <div>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="type" value="1" {{ (isset($airline['type'])&&$airline['type']==1)||(old('type') != 2)?'checked':'' }}  > Domestic </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="type" value="2" {{ (isset($airline['type'])&&$airline['type']==2)||(old('type') == 2)?'checked':'' }}  > International </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Short name</label>
                                <div class="col-md-6 {{ $errors->has('short_name') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="short_name" value="{{ old('short_name') ? old('short_name') : $airline['short_name'] }}" placeholder="Short Name" required>
                                        @if ($errors->has('short_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('short_name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Code</label>
                                <div class="col-md-6 {{ $errors->has('code') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="code" value="{{ old('code') ? old('code') : $airline['code'] }}" placeholder="Code" required>
                                        @if ($errors->has('code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('code') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Ticket Code</label>
                                <div class="col-md-6 {{ $errors->has('ticket_code') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="ticket_code" value="{{ old('ticket_code') ? old('ticket_code') : $airline['ticket_code'] }}" placeholder="Ticket Code" required>
                                        @if ($errors->has('ticket_code'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('ticket_code') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Commission 1</label>
                                <div class="col-md-6 {{ $errors->has('commission_1') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="commission_1" value="{{ old('commission_1') ? old('commission_1') : $airline['commission_1'] }}" placeholder="commission 1" required>
                                        @if ($errors->has('commission_1'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('commission_1') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Commission 2</label>
                                <div class="col-md-6 {{ $errors->has('commission_2') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="commission_2" value="{{ old('commission_2') ? old('commission_2') : $airline['commission_2'] }}" placeholder="commission 2" required>
                                        @if ($errors->has('commission_2'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('commission_2') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required ">
                                <label class="col-md-3 control-label">Email Address</label>
                                <div class="col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-envelope"></i>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $airline['email'] }}"  placeholder="Email Address">
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Contact No</label>
                                <div class="col-md-6 {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-phone-square"></i>
                                        <input type="text" class="form-control" name="mobile" value="{{ old('mobile') ? old('mobile') : $airline['mobile'] }}" placeholder="Contact No" >
                                        @if ($errors->has('mobile'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Address</label>
                                <div class="col-md-6 {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-envelope-o"></i>
                                        <textarea type="text" class="form-control" name="address" placeholder="Address" >{{ old('address') ? old('address') : $airline['address'] }}</textarea>
                                        @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Contact Person</label>
                                <div class="col-md-6 {{ $errors->has('contact_person') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="contact_person" value="{{ old('contact_person') ? old('contact_person') : $airline['contact_person'] }}" placeholder="Contact Person" required>
                                        @if ($errors->has('contact_person'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_person') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Logo</label>
                                <div class="col-md-6 {{ $errors->has('logo') ? 'has-error' : '' }}">
                                    @if ($airline['logo'])
                                        <img src="{{url($airline->logo)}}" height="100" />
                                        <button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                                    @else
                                        <input type="file" name="image" class="form-control">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Remarks</label>
                                <div class="col-md-6 {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-align-justify"></i>
                                        <textarea type="text" class="form-control" name="remarks" placeholder="Remarks" >{{ old('remarks') ? old('remarks') : $airline['remarks'] }}</textarea>
                                        @if ($errors->has('remarks'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('remarks') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Is Active</label>
                                <div>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="1" {{ (isset($airline['active_status'])&&$airline['active_status']==1)||(old('active_status') != 2)?'checked':'' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="2" {{ (isset($airline['active_status'])&&$airline['active_status']==2)||(old('active_status') == 2)?'checked':'' }}  > No </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('airline') }}" class="btn default">Cancel</a>
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
<script type="text/javascript">

</script>
@endsection
