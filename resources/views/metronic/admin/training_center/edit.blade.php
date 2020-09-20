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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Training Center</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/training_center') }}" class="text-muted">Training Center</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Edit</a>
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
                        <h3 class="card-title">Edit Training Center</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                            <a href="{{ url('admin/training_center') }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('training_center_update',$trainingCenter['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="card-body">
                        <input type="hidden" name="_method" value="PUT">
                            
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Division<i style="color: red">*</i></label>
                                <div class="col-md-10 {{ $errors->has('division_id') ? 'has-error' : '' }}">
                                    
                                <select class="form-control select2" id="kt_select2_2" name="division_id" required >
                                        <option>Select Division</option>
                                        @foreach ($divisionList as $division)
                                            <option value="{{ $division->id }}" {{ ($division->id == $trainingCenter['division_id']) ? "selected" : "" }}>{{ $division->title_en }}</option>
                                        @endforeach  
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Office Name<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('office_name') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text" name="office_name" value="{{ old('office_name')? old('office_name') : $trainingCenter['office_name'] }}" placeholder="Office Name" required />
                                    @if ($errors->has('office_name'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('office_name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Address<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('address') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text" name="address" value="{{ old('address')? old('address') : $trainingCenter['address'] }}" placeholder="Address" required />
                                    @if ($errors->has('address'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Area<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('area') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text" name="area" value="{{ old('area')? old('area') : $trainingCenter['area'] }}" placeholder="Area" required />
                                    @if ($errors->has('area'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('area') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Year of Establishment<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('year_of_establishment') ? 'has-error' : '' }}">
                                    <input class="form-control" type="number" name="year_of_establishment" value="{{ old('year_of_establishment')? old('year_of_establishment') : $trainingCenter['year_of_establishment'] }}" placeholder="Year of Establishment" required />
                                    @if ($errors->has('year_of_establishment'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('year_of_establishment') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Year of Starting Operation<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('year_of_operation') ? 'has-error' : '' }}">
                                    <input class="form-control" type="number" name="year_of_operation" value="{{ old('year_of_operation')? old('year_of_operation') : $trainingCenter['year_of_operation'] }}" placeholder="Year of Starting Operation" required />
                                    @if ($errors->has('year_of_operation'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('year_of_operation') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Present Principal<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('present_principal') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="present_principal" value="{{ old('present_principal')? old('present_principal') : $trainingCenter['present_principal'] }}" placeholder="Present Principal" required />
                                    @if ($errors->has('present_principal'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('present_principal') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Land Phone</label>
                                <div class="col-10 {{ $errors->has('land_phone') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="land_phone" value="{{ old('land_phone')? old('land_phone') : $trainingCenter['land_phone'] }}" placeholder="Land Phone" />
                                    @if ($errors->has('land_phone'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('land_phone') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Mobile<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('mobile') ? 'has-error' : '' }}">
                                    <input class="form-control" type="number" name="mobile" value="{{ old('mobile')? old('mobile') : $trainingCenter['mobile'] }}" placeholder="Mobile" required />
                                    @if ($errors->has('mobile'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('mobile') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Email<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('email') ? 'has-error' : '' }}">
                                    <input class="form-control" type="email" name="email" value="{{ old('email')? old('email') : $trainingCenter['email'] }}" placeholder="Email" required />
                                    @if ($errors->has('email'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('email') }}</strong>
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
                                            <input type="radio" name="active_status" value="Active" {{ (isset($trainingCenter['active_status'])&&$trainingCenter['active_status']=='Active')||(old('active_status') != 'Inactive')?'checked':'' }}  > Yes<span></span>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Inactive" {{ (isset($trainingCenter['active_status'])&&$trainingCenter['active_status']=='Inactive')||(old('active_status') == 'Inactive')?'checked':'' }}  > No<span></span>
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
                                    <a href="{{ route('training_center') }}" class="btn btn-danger">Cancel</a>
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
