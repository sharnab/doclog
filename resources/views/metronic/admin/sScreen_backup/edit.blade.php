@extends('layouts.admin')
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Splash Screen <small>Edit</small></h1>
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
                        <i class="fa fa-home"></i>Edit Splash Screen
                    </div>
                    <a href="{{route('splashscreen')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['url' => route( 'splashscreen_update',$splashscreen['id'] ) , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}
                        {{method_field('PUT')}}
                        <div class="form-body">
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Title English</label>
                                <div class="col-md-6 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $splashscreen['title'] }}" placeholder="Title In English" required>
                                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Title Bangla</label>
                                <div class="col-md-6 {{ $errors->has('title_bn') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="title_bn" value="{{ old('title_bn') ? old('title_bn') : $splashscreen['title_bn'] }}" placeholder="Title In Bangla" required>
                                    @if ($errors->has('title_bn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title_bn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Description English</label>
                                <div class="col-md-6 {{ $errors->has('description') ? 'has-error' : '' }}">
                                    
                                    <textarea type="text" class="form-control" name="description" placeholder="Description In English" required>{{ old('description') ? old('description') : $splashscreen['description'] }}</textarea>
                                    @if ($errors->has('description'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Description Bangla</label>
                                <div class="col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                                <textarea type="text" class="form-control" name="description_bn" placeholder="Description In Bangla" required>{{ old('description_bn') ? old('description_bn') : $splashscreen['description_bn'] }}</textarea>
                                    @if ($errors->has('description_bn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('description_bn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Display Sequence</label>
                                <div class="col-md-6 {{ $errors->has('display_sequence') ? 'has-error' : '' }}">
                                    <p>Position {{ $comma_separated }} Already Occupied</p>
                                    <input type="number" class="form-control" name="display_sequence" value="{{ old('display_sequence') ? old('display_sequence') : $splashscreen['display_sequence'] }}" placeholder="display_sequence" required>
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
                                    @if ($splashscreen['file_url'])
                                        <img src="{{url($splashscreen->file_url)}}" height="100" />
                                        <button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to change this image?')">Delete</button>
                                    @else
                                        <input type="file" name="image" class="form-control">
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="col-md-3 control-label">Is Active</label>
                                <div>
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="Active" {{ (isset($splashscreen['active_status'])&&$splashscreen['active_status']=='Active')||(old('active_status') != 'Inctive')?'checked':'' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="Inactive" {{ (isset($splashscreen['active_status'])&&$splashscreen['active_status']=='Inactive')||(old('active_status') == 'Inactive')?'checked':'' }}  > No </label>
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
