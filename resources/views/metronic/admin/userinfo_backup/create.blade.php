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
            <h1>Userinfo <small>New</small></h1>
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
            <a href="{{ url('admin/userinfo') }}">Userinfo</a>
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
                        <i class="fa fa-home"></i>Create New User
                    </div>
                    <a href="{{route('userinfo.index')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['route' => 'userinfo.store' , 'class' => 'form-horizontal', 'role' => 'form']) }}
                        <div class="form-body">

                            <div class="form-group">
                                <label class="col-md-3 control-label required">Full Name</label>
                                <div class="col-md-6 {{ $errors->has('fullname') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" placeholder="Full Name" required>
                                    @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Username</label>
                                <div class="col-md-6 {{ $errors->has('username') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required>
                                        @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
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
                            <div class="form-group ">
                                <label class="col-md-3 control-label required">Email Address</label>
                                <div class="col-md-6 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-envelope"></i>
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email Address">
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Mobile No</label>
                                <div class="col-md-6 {{ $errors->has('contactno') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-phone-square"></i>
                                        <input type="text" class="form-control" name="contactno" value="{{ old('contactno') }}" placeholder="Mobile No" >
                                        @if ($errors->has('contactno'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contactno') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Password</label>
                                <div class="col-md-6 {{ $errors->has('password') ? 'has-error' : '' }}">
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
                                <div class="col-md-6 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
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

                            <div class="form-group">
                                <label class="col-md-3 control-label required">User Type</label>
                                <div class="col-md-6 {{ $errors->has('usertype') ? 'has-error' : '' }}">
                                    <select class="form-control select2" name="usertype" id="usertype">
                                        <option value=""></option>
                                        @foreach ($allUserGroup as $groupId => $groupName )
                                        <option value="{{ $groupId }}" {{ (old('usertype') == $groupId) ? 'selected' : '' }} >
                                            {{ $groupName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('usertype'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('usertype') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('userinfo.index') }}" class="btn default">Cancel</a>
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

$('#usertype').select2({
    placeholder: "select a usertype",
    allowClear: true
});

$('#company_id').select2({
    placeholder: "select a company",
    tags:true
});

$("#checkbox_company").click(function(){
    if($("#checkbox_company").is(':checked') ){
        $("#company_id > option").prop("selected","selected");
        $("#company_id").trigger("change");
    }else{
        $("#company_id > option").removeAttr("selected");
        $("#company_id").trigger("change");
    }
});
</script>
@endsection
