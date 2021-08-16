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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Recruiting Agency</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/agency') }}" class="text-muted">Recruiting Agency</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Create New</a>
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
                        <h3 class="card-title">New Recruiting Agency</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                            <a href="{{ url('admin/agency') }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('agency_store') }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="card-body">


                            <div class="form-group row">
                                <label class="col-2 col-form-label">Agency Name<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('agency_name') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="agency_name" value="{{ old('agency_name') }}" placeholder="Agency Name" required />
                                    @if ($errors->has('agency_name'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('agency_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Licence No<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('licence_no') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="licence_no" value="{{ old('licence_no') }}" placeholder="Licence Number" required />
                                    @if ($errors->has('licence_no'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('licence_no') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Agent Name<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('agent_name') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="agent_name" value="{{ old('agent_name') }}" placeholder="Agent name" required />
                                    @if ($errors->has('agent_name'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('agent_name') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Agent Position<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('agent_position') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="agent_position" value="{{ old('agent_position') }}" placeholder="Agent Position" required />
                                    @if ($errors->has('agent_position'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('agent_position') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Agency Address<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="address" value="{{ old('address') }}" placeholder="Agency Address" required />
                                    @if ($errors->has('address'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Agent Address<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('agent_address') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="agent_address" value="{{ old('agent_address') }}" placeholder="Agent Address" required />
                                    @if ($errors->has('agent_address'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('agent_address') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Email<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="email" value="{{ old('email') }}" placeholder="Email Address" required />
                                    @if ($errors->has('email'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Land Phone Number<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('land_phone') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="land_phone" value="{{ old('land_phone') }}" placeholder="Land Phone Number" required />
                                    @if ($errors->has('land_phone'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('land_phone') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Mobile Number<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="mobile" value="{{ old('mobile') }}" placeholder="Mobile Number" required />
                                    @if ($errors->has('mobile'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>

                            </div>
                            <div class="form-group row">
                                <!-- {{ Form::label('icon', __('Icon')),['class'=>'col-form-label text-right col-lg-2 col-sm-12'] }} -->
                                <label class="col-2 col-form-label">Licence Valid Till<i style="color: red">*</i></label>
                                <div id="datepicker" class="col-10 input-group date {{ $errors->has('renewed_upto_date') ? 'has-error' : '' }}" data-date-format="yyyy-mm-dd">

                                    <input type="text" class="form-control" placeholder="Licence Valid Date" name='renewed_upto_date' readonly>
                                    <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span>
                                    @if($errors->has('renewed_upto_date'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('renewed_upto_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <!-- <div class="form-group row">
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

                            </div> -->



                            <div class="form-group row">
                                <label class="col-2 col-form-label">Is Active<i style="color: red">*</i></label>
                                <div class="col-9">
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Active" {{ (isset($agency['active_status'])&&$agency['active_status']=='Active')||(old('active_status') != 'Inactive')?'checked':'' }}  > Yes<span></span>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Inactive" {{ (isset($agency['active_status'])&&$agency['active_status']=='Inactive')||(old('active_status') == 'Inactive')?'checked':'' }}  > No<span></span>
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
                                    <a href="{{ route('agency') }}" class="btn btn-danger">Cancel</a>
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
