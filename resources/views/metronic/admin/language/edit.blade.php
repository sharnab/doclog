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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Language</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/language') }}" class="text-muted">Language</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Edit Language</a>
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
                        <h3 class="card-title">Edit Language</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                            <a href="{{ url('admin/language') }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('language_update',$language['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                        <div class="card-body">
                            <input type="hidden" name="_method" value="PUT">
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Language English<i style="color: red">*</i></label>
                                <div class="col-md-10 {{ $errors->has('title') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="title" value="{{ old('title') ? old('title') : $language['title'] }}" placeholder="Language name in english" required>
                                    @if ($errors->has('title'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-2 col-form-label">Language Bangla<i style="color: red">*</i></label>
                                <div class="col-md-10 {{ $errors->has('title_bn') ? 'has-error' : '' }}">
                                    <input type="text" class="form-control" name="title_bn" value="{{ old('title_bn') ? old('title_bn') : $language['title_bn'] }}" placeholder="Language name in bangla" required>
                                    @if ($errors->has('title_bn'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('title_bn') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Display Sequence<i style="color: red">*</i></label>
                                <div class="col-10 {{ $errors->has('display_sequence') ? 'has-error' : '' }}">
                                    <input class="form-control" type="text"name="display_sequence" value="{{ old('display_sequence') ? old('display_sequence') : $language['display_sequence'] }}" placeholder="Display sequence number" required />
                                    @if ($errors->has('display_sequence'))
                                    <span class="form-text text-muted">
                                        <strong>{{ $errors->first('display_sequence') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                   
                            </div>
                            
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Is Active<i style="color: red">*</i></label>
                                <div class="col-10">
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Active" {{ (isset($language['active_status'])&&$language['active_status']=='Active')||(old('active_status') != 'Inactive')?'checked':'' }}  > Yes<span></span>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Inactive" {{ (isset($language['active_status'])&&$language['active_status']=='Inactive')||(old('active_status') == 'Inactive')?'checked':'' }}  > No<span></span>
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
                                    <a href="{{ route('language') }}" class="btn btn-danger">Cancel</a>
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
