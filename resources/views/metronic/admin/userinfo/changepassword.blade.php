@extends('layouts.admin')
@section('extra_css')

<style type="text/css">
    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }

    .custom-file-input {
        color: transparent;
    }

    .custom-file-input::-webkit-file-upload-button {
        visibility: hidden;
    }

    .custom-file-input::before {
        content: 'Select some files';
        color: black;
        display: inline-block;
        background: -webkit-linear-gradient(top, #f9f9f9, #e3e3e3);
        border: 1px solid #999;
        border-radius: 3px;
        padding: 5px 8px;
        outline: none;
        white-space: nowrap;
        -webkit-user-select: none;
        cursor: pointer;
        text-shadow: 1px 1px #fff;
        font-weight: 700;
        font-size: 10pt;
    }

    .custom-file-input:hover::before {
        border-color: black;
    }

    .custom-file-input:active {
        outline: 0;
    }

    .custom-file-input:active::before {
        background: -webkit-linear-gradient(top, #e3e3e3, #f9f9f9);
    }

    body {
        padding: 20px;
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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Expatriate Add</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/expatriate') }}" class="text-muted">Expatriate</a>
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

{{-- <div class="d-flex flex-column flex-root"> --}}
<!--begin::Page-->
{{-- <div class="d-flex flex-row flex-column-fluid page"> --}}

<!--begin::Wrapper-->
{{-- <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper" style="padding: 0px"> --}}
<!--begin::Content-->
{{-- <div class="content d-flex flex-column flex-column-fluid" id="kt_content"> --}}

<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <div class="card card-custom">
            <div class="card-body p-0">
                @include('layouts.alert')
                <!--begin::Wizard-->
                <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first" data-wizard-clickable="false">
                    <!--begin::Wizard Body-->
                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                        <div class="col-xl-12">
                            <!--begin::Wizard Form-->
                            {{ Form::open(['route' => 'reset_pass' , 'class' => 'form-horizontal', 'role' => 'form']) }}
                                <!--begin::Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <input type="hidden" class="form-control" name="id" value="{{$id}}"  required>

                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Change Password</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group">
                                                <label class="col-md-3 control-label required">Password</label>
                                                <div class="col-md-8 {{ $errors->has('password') ? 'has-error' : '' }}">
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
                                                <div class="col-md-8 {{ $errors->has('password_confirmation') ? 'has-error' : '' }}">
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
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div>
                                        <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                        <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">Next Step</button>
                                    </div>
                                </div>
                            {{ Form::close() }}
                        </div>

                    </div>

                    <!--end::Wizard Body-->
                </div>
            </div>
            <!--end::Wizard-->
        </div>
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
{{-- </div> --}}
<!--end::Content-->

{{-- </div> --}}
<!--end::Wrapper-->
{{-- </div> --}}
<!--end::Page-->
{{-- </div> --}}
<!--end::Main-->

<!--begin::Scrolltop-->
<div id="kt_scrolltop" class="scrolltop">
    <span class="svg-icon">
        <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Up-2.svg-->
        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                <polygon points="0 0 24 0 24 24 0 24" />
                <rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1" />
                <path
                    d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                    fill="#000000" fill-rule="nonzero" />
            </g>
        </svg>
        <!--end::Svg Icon-->
    </span>
</div>
<!--end::Scrolltop-->

@endsection
@section('scripts')
<script type="text/javascript">
    $('.per_division').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/public/address/district_by_division?division_id=', '.per_district')
    });

    $('.per_district').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/public/address/upazila_by_district?district_id=', '.per_upazila')
    });

    $('.per_upazila').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/public/address/union_by_upazila?upazila_id=', '.per_union')
    });

    $('.mail_division').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/public/address/district_by_division?division_id=', '.mail_district')
    });

    $('.mail_district').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/public/address/upazila_by_district?district_id=', '.mail_upazila')
    });

    $('.mail_upazila').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/public/address/union_by_upazila?upazila_id=', '.mail_union')
    });

    function setData(id, url, className) {
        jQuery.ajax({
            type: "GET",
            url: url + id,
            dataType: "JSON",
            success: function(data) {
                console.log(data.data);
                jQuery(className).empty();
                jQuery(className).prop("selected", false)
                jQuery(className).attr('disabled', 'disabled');
                if (data !== '') {
                    jQuery(className).append(
                        function() {
                            return $.map(data.data, function(el, i) {
                                return '<option value=' + el.id + '>' + el.title_en + '</option>';
                            });
                        }
                    );
                    jQuery(className).removeAttr('disabled');
                }
            }
        });
    }

    var avatar5 = new KTImageInput('kt_image_5');

    avatar5.on('cancel', function(imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar5.on('change', function(imageInput) {
        swal.fire({
            title: 'Image successfully changed !',
            type: 'success',
            buttonsStyling: false,
            confirmButtonText: 'Awesome!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    avatar5.on('remove', function(imageInput) {
        swal.fire({
            title: 'Image successfully removed !',
            type: 'error',
            buttonsStyling: false,
            confirmButtonText: 'Got it!',
            confirmButtonClass: 'btn btn-primary font-weight-bold'
        });
    });

    $('input[name="passport_image"]').change(function(e){
        fileUploader(e, $(this));
    });

    $('input[name="nid_image"]').change(function(e){
        fileUploader(e, $(this));
    });

    $('input[name="immigration_endorsement_file"]').change(function(e){
        fileUploader(e, $(this));
    });

    $('input[name="visa_type_file"]').change(function(e){
        fileUploader(e, $(this));
    });

    $('input[name="bmet_file"]').change(function(e){
        fileUploader(e, $(this));
    });

    $('input[name="ministry_approval_file"]').change(function(e){
        fileUploader(e, $(this));
    });

    $('input[name="work_permit_file"]').change(function(e){
        fileUploader(e, $(this));
    });


    function fileUploader(data, loc){
        var fileName = data.target.files[0].name;
        var fileExt = fileName.split('.').pop();

        if(fileExt === 'jpg'||fileExt === 'JPG'||fileExt === 'jpeg'||fileExt === 'JPEG'||fileExt === 'png'||fileExt === 'PNG'||fileExt === 'gif'||fileExt === 'GIF'||fileExt === 'pdf'||fileExt === 'PDF'){
            loc.parent().addClass('fas fa-check icon-lg text-success');
            loc.parent().removeClass('flaticon-upload');
        } else {
            loc.value = '';
            alert('Please upload either Image or PDF file');
        }
    }

    $('#kt_datepicker_3, #kt_datepicker_3_validate').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true
    });

    // var KTFormRepeater = function() {
    //
    //     var demo3 = function() {
    //         $('#kt_repeater_3').repeater({
    //             initEmpty: false,
    //
    //             defaultValues: {
    //                 'text-input': 'foo'
    //             },
    //
    //             show: function() {
    //                 $(this).slideDown();
    //             },
    //
    //             hide: function(deleteElement) {
    //                 if (confirm('Are you sure you want to delete this element?')) {
    //                     $(this).slideUp(deleteElement);
    //                 }
    //             }
    //         });
    //     }
    //
    //     return {
    //         init: function() {
    //             demo3();
    //         }
    //     };
    // }();

    // jQuery(document).ready(function() {
    //     KTFormRepeater.init();
    // });
</script>
@endsection
