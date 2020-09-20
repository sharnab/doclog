@extends('layouts.admin')
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Institution <small>Edit</small></h1>
        </div>
        <!-- END PAGE TITLE -->

    <!-- END PAGE HEAD -->
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-home"></i>Edit Institution
                    </div>
                    <a href="{{route('education')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['url' => route( 'education_update',$education['id'] ) , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}
                        {{method_field('PUT')}}
                        <div class="form-body">
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Institution Name</label>
                                <div class="col-md-6 {{ $errors->has('institute_name') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="institute_name" value="{{ old('institute_name') ? old('institute_name') : $education['institute_name'] }}" placeholder="Institution name" required>
                                    @if ($errors->has('institute_name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('institute_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <!-- <div class="form-group">
                                <label class="col-md-3 control-label">Institution Name Bangla</label>
                                <div class="col-md-6 {{ $errors->has('institute_name_bn') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        
                                        <input type="text" class="form-control" name="institute_name_bn" value="{{ old('institute_name_bn') ? old('institute_name_bn') : $education['institute_name_bn'] }}" placeholder="Institution name in english" required>
                                        @if ($errors->has('institute_name_bn'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('institute_name_bn') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div> -->
                            <div class="form-group">
                                <label class="col-md-3 control-label">Is Active<i style="color: red">*</i></label>
                                <div>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="Active" {{ (isset($education['active_status'])&&$education['active_status']=='Active')||(old('active_status') != 'Inactive')?'checked':'' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="Inactive" {{ (isset($education['active_status'])&&$education['active_status']=='Inactive')||(old('active_status') == 'Inactive')?'checked':'' }}  > No </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('education') }}" class="btn default">Cancel</a>
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
