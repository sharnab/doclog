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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Hospital</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('hospital')}}" class="text-muted">Hospital</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#" class="text-muted">Create New Hospital</a>
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
                            <h3 class="card-title">New Hospitals</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                    <a href="{{route('hospital')}}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        @include('layouts.alert')
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('hospital_store') }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="form-group row">
                                        <div class="col-md-12">
                                            <div class="form-group required">
                                                {{ Form::label('name_en', __('Name (In English)')) }}
                                                {{ Form::text('name_en',old('name_en'),['class'=>'form-control','required'=>true]) }}
                                                @if($errors->has('name_en'))
                                                    <label id="title-error" class="error" for="name_en">{{ $errors->first('name_en') }}</label>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('name_bn', __('Name (In Bangla)')) }}
                                                {{ Form::text('name_bn',old('name_en'),['class'=>'form-control','required'=>true]) }}
                                                @if($errors->has('name_bn'))
                                                    <label id="title-error" class="error" for="name_bn">{{ $errors->first('name_bn') }}</label>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                <label class="col-md-3 control-label required">Area</label>
                                                <div class="col-md-12 {{ $errors->has('area_id') ? 'has-error' : '' }}">
                                                    <select class="form-control select2" name="area_id" id="area_id" >
                                                        <option value="">Select Area</option>
                                                        @foreach ($allArea as $key=>$value )
                                                            <option value="{{ $key }}" {{ (old('area_id') == $key) ? 'selected' : '' }} >
                                                                {{ $value }}
                                                            </option>
                                                        @endforeach
                                                    </select>

                                                    @if ($errors->has('area_id'))
                                                        <span class="help-block has-error">
                                                        <strong>{{ $errors->first('area_id') }}</strong>
                                                    </span>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <label class="col-4 col-form-label">Is Active<i style="color: red">*</i></label>
                                        <div class="col-8">
                                            <div class="radio-inline">
                                                <label class="radio">
                                                    <input type="radio" name="active_status" value="Active" {{ (old('active_status') != 'Inactive')?'checked':'' }}  > Yes<span></span>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="active_status" value="Inactive" {{ (old('active_status') == 'Inactive')?'checked':'' }}  > No<span></span>
                                                </label>

                                            </div>

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
                                        <a href="{{ route('hospital') }}" class="btn btn-danger">Cancel</a>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

    <script type="text/javascript">

        $('#area_id').select2({
            placeholder: "select a area",
            allowClear: true
        });
    </script>
@endsection
