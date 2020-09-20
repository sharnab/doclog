@extends('layouts.admin')
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Sales Executive <small>Edit</small></h1>
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
            <a href="{{ url('admin/salesexecutive') }}">Sales Executive</a>
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
                        <i class="fa fa-home"></i>Edit Sales Executive
                    </div>
                    <a href="{{route('salesexecutive')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['url' => route( 'salesexecutive_update',$salesexecutive['id'] ) , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}
                        {{method_field('PUT')}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Name<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $salesexecutive['name'] }}" placeholder="Name" required>
                                    @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group ">
                                <label class="col-md-3 control-label required">Email Address<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-envelope"></i>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') ? old('email') : $salesexecutive['email'] }}"  placeholder="Email Address">
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Contact No<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-phone-square"></i>
                                        <input type="text" class="form-control" name="mobile" value="{{ old('mobile') ? old('mobile') : $salesexecutive['mobile'] }}" placeholder="Contact No" >
                                        @if ($errors->has('mobile'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('mobile') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Address</label>
                                <div class="col-md-6 {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-envelope-o"></i>
                                        <textarea type="text" class="form-control" name="address" placeholder="Address" >{{ old('address') ? old('address') : $salesexecutive['address'] }}</textarea>
                                        @if ($errors->has('address'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('address') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Image</label>
                                <div class="col-md-6 {{ $errors->has('image') ? 'has-error' : '' }}">
                                    @if ($salesexecutive['image'])
                                        <img src="{{url($salesexecutive['image'])}}" height="100" />
                                        <button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this image?')">Delete</button>
                                    @else
                                        <input type="file" name="image" class="form-control">
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Status<i style="color: red">*</i></label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="1" {{ $salesexecutive['active_status'] == 1 ? 'checked' : '' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="2" {{ $salesexecutive['active_status'] == 2 ? 'checked' : '' }}  > No </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('salesexecutive') }}" class="btn default">Cancel</a>
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
