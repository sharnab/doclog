@extends('layouts.admin')
@section('extra_css')

<style type="text/css">
    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }
</style>
@endsection

@section('content')
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Splash Screen <small>New</small></h1>
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
            <a href="{{ url('admin/splashscreen') }}">Splash Screen</a>
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
                        <i class="fa fa-home"></i>Create New Splash Screen
                    </div>
                    <a href="{{route('splashscreen')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['route' => 'splashscreen_store' , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}

                        <div class="form-body">
                            <div class="form-group required">
                                <label class="col-md-3 control-label ">Title Bangla</label>
                                <div class="col-md-6 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') }}" placeholder="Screen Title In English" required>
                                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label ">Title Bangla</label>
                                <div class="col-md-6 {{ $errors->has('title_bn') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="title_bn" value="{{ old('title_bn') }}" placeholder="Screen Title In Bangla" required>
                                    @if ($errors->has('title_bn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title_bn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label ">Description English</label>
                                <div class="col-md-6 {{ $errors->has('description') ? 'has-error' : '' }}">
                                    <textarea type="text" class="form-control" name="description" placeholder="Description In English" required>{{ old('description') }}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            
                            <div class="form-group required">
                                <label class="col-md-3 control-label ">Description Bangla</label>
                                <div class="col-md-6 {{ $errors->has('description_bn') ? 'has-error' : '' }}">
                                    <textarea type="text" class="form-control" name="description_bn" placeholder="Description In Bangla" required>{{ old('description_bn') }}</textarea>
                                    @if ($errors->has('description_bn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description_bn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label ">Display Sequence</label>
                                
                                <div class="col-md-6 {{ $errors->has('display_sequence') ? 'has-error' : '' }}">
                                    <p>Position {{ $comma_separated }} Already Occupied</p>
                                    <input type="number" class="form-control" name="display_sequence" value="{{ old('display_sequence') }}" placeholder="Sequence Number" required>
                                    @if ($errors->has('display_sequence'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('display_sequence') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Image</label>
                                <div class="col-md-6 {{ $errors->has('file_url') ? 'has-error' : '' }}">
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Is Active</label>
                                <div>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="Active" {{ (old('active_status') != 'Inactive')?'checked':'' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="Inactive" {{ (old('active_status') == 'Inactive')?'checked':'' }}  > No </label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('splashscreen') }}" class="btn default">Cancel</a>
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
