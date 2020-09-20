@extends('layouts.admin')
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Division <small>Edit</small></h1>
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
                        <i class="fa fa-home"></i>Edit Division
                    </div>
                    <a href="{{route('division')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['url' => route( 'division_update',$division['id'] ) , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}
                        {{method_field('PUT')}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label">Division Name English</label>
                                <div class="col-md-6 {{ $errors->has('title_en') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        
                                        <input type="text" class="form-control" name="title_en" value="{{ old('title_en') ? old('title_en') : $division['title_en'] }}" placeholder="Division name in english" required>
                                        @if ($errors->has('title_en'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('title_en') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group required">
                                <label class="col-md-3 control-label">Division Name Bangla</label>
                                <div class="col-md-6 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $division['title'] }}" placeholder="Division name in english" required>
                                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <!-- <div class="form-group">
                                <label class="col-md-3 control-label">Display Sequence</label>
                                <div class="col-md-6 {{ $errors->has('display_sequence') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        
                                        <input type="number" class="form-control" name="display_sequence" value="{{ old('display_sequence') ? old('display_sequence') : $division['display_sequence'] }}" placeholder="Code" required>
                                        @if ($errors->has('display_sequence'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('display_sequence') }}</strong>
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
                                        <input type="radio" name="active_status" value="Active" {{ (isset($division['active_status'])&&$division['active_status']=='Active')||(old('active_status') != 'Inactive')?'checked':'' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="Inactive" {{ (isset($division['active_status'])&&$division['active_status']=='Inactive')||(old('active_status') == 'Inactive')?'checked':'' }}  > No </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('division') }}" class="btn default">Cancel</a>
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
