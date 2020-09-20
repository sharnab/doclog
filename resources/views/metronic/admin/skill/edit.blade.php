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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Skill</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/skill') }}" class="text-muted">Skill</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Create New Skill</a>
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
                        <h3 class="card-title">New Skill</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                            <a href="{{ url('admin/skill') }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('skill_update',$skill['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="card-body">
                        <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Skill English<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="title" value="{{ old('title') ? old('title') : $skill['title'] }}" placeholder="Skill name in english" required />
                                    @if ($errors->has('title'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Skill Bangla<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('title_bn') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="title_bn" value="{{ old('title_bn') ? old('title_bn') : $skill['title_bn'] }}" placeholder="Skill name in bangla" required />
                                    @if ($errors->has('title_bn'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('title_bn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Display Sequence<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('display_sequence') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="display_sequence" value="{{ old('display_sequence') ? old('display_sequence') : $skill['display_sequence'] }}" placeholder="Display sequence number" required />
                                    @if ($errors->has('display_sequence'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('display_sequence') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Remarks</label>
                                <div class="col-10 {{ $errors->has('remarks') ? 'has-error' : '' }}">
                                    <textarea type="text" class="form-control" name="remarks" placeholder="Remarks" >{{ old('remarks') ? old('remarks') : $skill['remarks'] }}</textarea>
                                    @if ($errors->has('remarks'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('remarks') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Is Active<i style="color: red">*</i></label>
                                <div class="col-9">
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Active" {{ (isset($skill['active_status'])&&$skill['active_status']=='Active')||(old('active_status') != 'Inactive')?'checked':'' }}  > Yes<span></span>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Inactive" {{ (isset($skill['active_status'])&&$skill['active_status']=='Inactive')||(old('active_status') == 'Inactive')?'checked':'' }}  > No<span></span>
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
                                    <a href="{{ route('skill') }}" class="btn btn-danger">Cancel</a>
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