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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Feedback</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/'.$module_route) }}" class="text-muted">Feedback</a>
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
                        <h3 class="card-title">Edit Feedback</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                            <a href="{{ url('admin/country') }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('feedback.update',$item->id) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="card-body">
                        <input type="hidden" name="_method" value="PUT">
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="col-md-4 col-form-label">Passport Number<i style="color: red">*</i></label>
                                <div class="col-md-12 {{ $errors->has('expat_id') ? 'has-error' : '' }}">
                                    <select class="form-control select_expat_id" id="kt_select_1" name="expat_id">
                                        <option value='null'>Select Passport Number</option>
                                        @foreach ($expatList as $expat)
                                        <option value="{{ $expat['id'] }}" {{ $expat['id'] == $item->expat_id ? 'selected' : '' }}>
                                            {{ $expat['passport_number'] }}
                                        </option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('expat_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('expat_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6" id='expat_info'>
                                <div class="col-md-12">
                                    <div class="col-md-12 col-form-label">Full Name<span id="name" style="padding-left: 50%">{{$item->first_name.' '.$item->last_name}}</span></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12 col-form-label">Contact Number<span id="contact_no" style="padding-left: 39%">{{$item->contact_no}}</span></div>
                                </div>
                                <div class="col-md-12">
                                    <div class="col-md-12 col-form-label">Category Of Worker<span id="worker_category" style="padding-left: 34%">{{$item->worker_category_id}}</span></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="col-md-4 col-form-label">Feedback<i style="color: red">*</i></label>
                                <div class="col-md-12 {{ $errors->has('feedback') ? 'has-error' : '' }}">
                                    <textarea class="form-control" name="feedback" required>{{ ($item->feedback)?$item->feedback:old('feedback') }}</textarea>
                                    @if ($errors->has('feedback'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('feedback') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="col-4 col-form-label">Is Active<i style="color: red">*</i></label>
                                <div class="col-8">
                                    <div class="radio-inline">
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Active" {{ (isset($item->active_status)&&$item->active_status=='Active')||(old('active_status') != 'Inactive')?'checked':'' }}  > Yes<span></span>
                                        </label>
                                        <label class="radio">
                                            <input type="radio" name="active_status" value="Inactive" {{ (isset($item->active_status)&&$item->active_status=='Inactive')||(old('active_status') == 'Inactive')?'checked':'' }}  > No<span></span>
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
                                <a href="{{ route('division') }}" class="btn btn-danger">Cancel</a>
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

    $('#kt_datepicker_3, #kt_datepicker_3_validate').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });

    $('.select_expat_id').on('change', function() {
        if($(this).val() > 0){
            setData($(this).val());
        } else {
            jQuery('#expat_info').css('display', 'none');
        }
    });

    $('.select_expat_id').on('load', function() {
        setData($(this).val());
    });

    function setData(id) {
        jQuery.ajax({
            type: "GET",
            url: "../../feedback/"+id+"/getExpatInfo",
            dataType: "JSON",
            success: function(data) {
                if (data !== '') {
                    console.log(data);
                    jQuery('#expat_info').css('display', 'block');
                    jQuery('#name').html(data.first_name + ' ' + data.last_name);
                    jQuery('#contact_no').html(data.contact_no)
                    jQuery('#worker_category').html(data.worker_category_id);
                }
                else{
                    jQuery('#expat_info').css('display', 'none');
                }
            }
        });
    }
    </script>
@endsection
