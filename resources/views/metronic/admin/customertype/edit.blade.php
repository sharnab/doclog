@extends('layouts.admin')
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Customer Type <small>Edit</small></h1>
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
            <a href="{{ url('admin/customertype') }}">Customer Type</a>
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
                        <i class="fa fa-home"></i>Edit Customer Type
                    </div>
                    <a href="{{route('customertype.index')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['url' => route( 'customertype.update',$customerType['id'] ) , 'class' => 'form-horizontal', 'role' => 'form']) }}
                        {{method_field('PUT')}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Name</label>
                                <div class="col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $customerType['name'] }}" placeholder="Name">
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
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
                                        <input type="radio" name="active_status" value="1" {{ $customerType['active_status'] == 1 ? 'checked' : '' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="2" {{ $customerType['active_status'] == 2 ? 'checked' : '' }}  > No </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('customertype.index') }}" class="btn default">Cancel</a>
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
