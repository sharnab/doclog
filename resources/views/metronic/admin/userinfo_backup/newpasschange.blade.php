@extends('layouts.blank')
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
        <div class="page-title" style="text-align: center">
            <h3>Update Password</h3>
        </div>
        <!-- END PAGE TITLE -->
        
    <!-- END PAGE HEAD -->
    </div>
    <!-- END PAGE HEAD -->

    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">

                <div class="portlet-title">
                    </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['route' => 'reset_pass' , 'class' => 'form-horizontal', 'role' => 'form']) }}
                        <div class="form-body">
                            <!-- User ID -->
                            <input type="hidden" class="form-control" name="id" value="{{$id}}"  required>

                            <div class="form-group">
                                <label class="col-md-3 control-label required">Password</label>
                                <div class="col-md-8 {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-lock fa-fw"></i>
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Re-Type Password</label>
                                <div class="col-md-8 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-lock fa-fw"></i>
                                        <input type="password" class="form-control"  name="password_confirmation" placeholder="Re-type Password">
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>



                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>

        </div>
    </div>

@endsection

