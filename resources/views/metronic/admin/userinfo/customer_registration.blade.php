@extends('layouts.admin')
@section('content')
    
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Customer <small>Credential Registration</small></h1>
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
            <a href="#">Registration</a>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-home"></i>Customer Registration
                    </div>
                    <a href="{{route('customer.index')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['route' => 'customer_registration_store', 'class' => 'form-horizontal', 'role' => 'form']) }}
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label required">Customer Type</label>
                                <?php $customer_type_selected= isset($customerInfo['customer_type'])? $customerInfo['customer_type']:'';  ?>
                                <div class="col-md-6 {{ $errors->has('customer_type') ? 'has-error' : '' }}">
                                   <h4>
                                       <?php if($customer_type_selected==1)
                                           {
                                               echo 'Individual Customer';
                                              ?> <input type="hidden" class="form-control" name="sys_group_id" value="6" required > <?php
                                           }else{
                                              echo 'Corporate Customer';
                                           ?> <input type="hidden" class="form-control" name="sys_group_id" value="7" required > <?php
                                       }
                                           ?>
                                   </h4>

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label required">Customer Name</label>
                                <div class="col-md-6 {{ $errors->has('full_name') ? 'has-error' : '' }}" >
                                    <h4>{{$customerInfo['full_name'] }}</h4>
                                    <input type="hidden" class="form-control" name="full_name" value="{{$customerInfo['full_name']}}" placeholder="{{ $customerInfo['full_name'] }}" required >
                                    <input type="hidden" class="form-control" name="customer_id" value="{{$customerInfo['customer_id']}}" placeholder="{{ $customerInfo['customer_id'] }}" required >
                                    @if ($errors->has('full_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('full_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="col-md-3 control-label">Mobile No</label>
                                <div class="col-md-6 {{ $errors->has('contact_no') ? 'has-error' : '' }}">
                                    <h4>{{$customerInfo['mobile_no'] }}</h4>

                                    <input type="hidden" class="form-control" name="contact_no" value="{{$customerInfo['mobile_no'] }}" placeholder="Mobile No">
                                    @if ($errors->has('contact_no'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contact_no') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Email</label>
                                <div class="col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <h4>{{$customerInfo['email'] }}</h4>

                                    <input type="hidden" class="form-control" name="email" value="{{$customerInfo['email'] }}" placeholder="Mobile No">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif

                                </div>
                            </div>


                            <div class="form-group ">
                                <label class="col-md-3 control-label required">User Name</label>
                                <div class="col-md-6 {{ $errors->has('username') ? 'has-error' : '' }}">
                                        <input type="text" class="form-control" name="username" value="{{ old('username') }}"  placeholder="User Name">
                                    @if ($errors->has('username'))
                                        <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-3 control-label">Status</label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="1" {{ old('status') != '0' ? 'checked' : '' }}  > Active </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="status" value="0" {{ old('status') == '0' ? 'checked' : '' }}  > Inactive </label>
                                        <label class="radio-inline">
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('customer.index') }}" class="btn default">Cancel</a>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection

