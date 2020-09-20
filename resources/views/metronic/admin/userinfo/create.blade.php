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
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
	<div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-2 mr-5">Userinfo New</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/userinfo') }}" class="text-muted">Userinfo</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">New</a>
                    </li>
                    
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Actions-->
            <!-- <a href="#" class="btn btn-light font-weight-bold btn-sm">Actions</a> -->
            <!--end::Actions-->
            
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            
                <!--begin::Card-->
                <div class="card card-custom example example-compact">
                    <div class="card-header">
                        <h3 class="card-title">Create New User</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                            <a href="{{ url('admin/userinfo') }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('userinfo.store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="card-body">
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Full Name</label>
                                <div class="col-md-10 {{ $errors->has('fullname') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" placeholder="Full Name" required>
                                    @if ($errors->has('fullname'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('fullname') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Username</label>
                                <div class="col-md-10 {{ $errors->has('username') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        
                                        <input type="text" class="form-control" name="username" value="{{ old('username') }}" placeholder="Username" required>
                                        @if ($errors->has('username'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('username') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Gender<i style="color: red">*</i></label>
                                <div class="col-9">
                                    <div class="radio-inline">
                                        <label class="radio">
                                        <input type="radio" name="gender" value="1" {{ old('gender') != 2 && old('gender') != 3 ? 'checked' : '' }}  > Male<span></span>
                                        </label>
                                        <label class="radio">
                                        <input type="radio" name="gender" value="2" {{ old('gender') == 2 ? 'checked' : '' }}  > Female<span></span>
                                        </label>
                                        <label class="radio">
                                        <input type="radio" name="gender" value="3" {{ old('gender') == 3 ? 'checked' : '' }}  > Other<span></span>
                                        </label>
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 control-label">Email Address</label>
                                <div class="col-md-10 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        
                                        <input type="text" class="form-control" name="email" value="{{ old('email') }}"  placeholder="Email Address">
                                    </div>
                                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 control-label">Mobile No</label>
                                <div class="col-md-10 {{ $errors->has('contactno') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        
                                        <input type="text" class="form-control" name="contactno" value="{{ old('contactno') }}" placeholder="Mobile No" >
                                        @if ($errors->has('contactno'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('contactno') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 control-label">Password</label>
                                <div class="col-md-10 {{ $errors->has('password') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        
                                        <input type="password" class="form-control" name="password" placeholder="Password">
                                    </div>
                                    @if ($errors->has('password'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 control-label">Re-Type Password</label>
                                <div class="col-md-10 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        
                                        <input type="password" class="form-control"  name="password_confirmation" placeholder="Re-type Password">
                                    </div>
                                    @if ($errors->has('password_confirmation'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-2 control-label">User Type</label>
                                <div class="col-md-10 {{ $errors->has('usertype') ? 'has-error' : '' }}">
                                    <select class="form-control" name="usertype" id="usertype">
                                        <option value="">Select User Type</option>
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
                            
                            <!--end: Code-->
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-2"></div>
                                <div class="col-10">
                                    <button type="submit" class="btn btn-success mr-2">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                    <a href="{{ route('userinfo.index') }}" class="btn btn-danger">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <!--end::Card-->
                
            </div>
            
        </div>
    </div>
    <!--end::Container-->
</div>
						<!--end::Entry-->

@endsection
@section('scripts')

<script type="text/javascript">

</script>
@endsection
