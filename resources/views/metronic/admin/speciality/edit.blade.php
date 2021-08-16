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
                    <h5 class="text-dark font-weight-bold my-2 mr-5">Specialities</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="{{ url('/') }}" class="text-muted">Home</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{route('speciality')}}" class="text-muted">Speciality</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#" class="text-muted">Update Speciality</a>
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
                            <h3 class="card-title">New Speciality</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                    <a href="{{route('speciality')}}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                                </div>
                            </div>
                        </div>
                        <!--begin::Form-->
                        @include('layouts.alert')
                        <form class="form-horizontal" role="form" method="POST" action="{{ route('speciality_update',$item->id) }}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="card-body">
                                <input type="hidden" name="_method" value="PUT">
                                <div class="form-group row">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <div class="form-group required">
                                                {{ Form::label('name_en', __('Name (In English)')) }}
                                                {{ Form::text('name_en',old('name_en') ? old('name_en') : $item->name_en,['class'=>'form-control','required'=>true]) }}
                                                @if($errors->has('name_en'))
                                                    <label id="title-error" class="error" for="name_en">{{ $errors->first('name_en') }}</label>
                                                @endif
                                            </div>
                                            <div class="form-group">
                                                {{ Form::label('name_bn', __('Name (In Bangla)')) }}
                                                {{ Form::text('name_bn',old('name_bn') ? old('name_bn') : $item->name_bn,['class'=>'form-control','required'=>true]) }}
                                                @if($errors->has('name_bn'))
                                                    <label id="title-error" class="error" for="name_bn">{{ $errors->first('name_bn') }}</label>
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
                                                    <input type="radio" name="active_status" value="Active" {{ ($item->active_status != 'Inactive')?'checked':'' }}  > Yes<span></span>
                                                </label>
                                                <label class="radio">
                                                    <input type="radio" name="active_status" value="Inactive" {{ ($item->active_status == 'Inactive')?'checked':'' }}  > No<span></span>
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
                                        <a href="{{ route('speciality') }}" class="btn btn-danger">Cancel</a>
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


@endsection
