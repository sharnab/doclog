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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Passport Office</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/passport') }}" class="text-muted">Passport Office</a>
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
                        <h3 class="card-title">New Passport Office</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                            <a href="{{ url('admin/passport') }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('passport_store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="card-body">
                        
    
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Regional Passport Offices<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('passport_name') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="passport_name" value="{{ old('passport_name') }}" placeholder="Regional Passport Offices" required />
                                    @if ($errors->has('passport_name'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('passport_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Address<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="address" value="{{ old('address') }}" placeholder="Address" required />
                                    @if ($errors->has('address'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Phone<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('phone') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="phone" value="{{ old('phone') }}" placeholder="Phone" required />
                                    @if ($errors->has('phone'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Email<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="email" value="{{ old('email') }}" placeholder="Email" required />
                                    @if ($errors->has('email'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Website</label>
                                <div class="col-10 {{ $errors->has('website') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="website" value="{{ old('website') }}" placeholder="Passport office website" />
                                    @if ($errors->has('website'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('website') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Facebook Link</label>
                                <div class="col-10 {{ $errors->has('facebook_link') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="facebook_link" value="{{ old('facebook_link') }}" placeholder="Facebook Link" />
                                    @if ($errors->has('facebook_link'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('facebook_link') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            
                            <!--<div class="form-group row">
                                <label class="col-2 col-form-label">Latitude</label>
                                <div class="col-10 {{ $errors->has('lat') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="lat" value="{{ old('lat') }}" placeholder="Latitude" />
                                    @if ($errors->has('lat'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('lat') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                             <div class="form-group row">
                                <label class="col-2 col-form-label">Longitude</label>
                                <div class="col-10 {{ $errors->has('lon') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="lon" value="{{ old('lon') }}" placeholder="Longitude" />
                                    @if ($errors->has('lon'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('lon') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>-->
                            
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Is Active<i style="color: red">*</i></label>
                                <div class="col-9">
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Active" {{ (isset($passport['active_status'])&&$passport['active_status']=='Active')||(old('active_status') != 'Inactive')?'checked':'' }}  > Yes<span></span>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Inactive" {{ (isset($passport['active_status'])&&$passport['active_status']=='Inactive')||(old('active_status') == 'Inactive')?'checked':'' }}  > No<span></span>
                                        </label>
                                        
                                    </div>
                                    
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
                                    <a href="{{ route('passport') }}" class="btn btn-danger">Cancel</a>
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
