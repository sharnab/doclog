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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Other Documents</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Document</a>
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
                        <h3 class="card-title">Edit Documents</h3>
                        <div class="card-toolbar">
                            <div class="example-tools justify-content-center">
                            <a href="{{ url('admin/userinfo/'.$items['id']) }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                            </div>
                        </div>
                    </div>
                    <!--begin::Form-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('personal_data_update',$items['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="pb-5" data-wizard-type="step-content">
                        <div class="card card-custom col-lg-12">
                            <div class="card-header">
                                <h3 class="card-title">Profile Image</h3>
                            </div>
                            <div class="card-body">
                                <!--begin::Input-->
                                <div class="form-group">
                                    <label>Photo:</label>
                                    <div class="col-lg-12 col-xl-12" style="text-align: center">
                                        <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{isset($items['image'])?asset($items['image']):url('/assets/media/misc/blank.jpg')}});">
                                            <div class="image-input-wrapper"></div>
                                            <label class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="change" data-toggle="tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen icon-sm text-muted"></i>
                                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" />
                                                <input type="hidden" name="profile_avatar_remove" />
                                            </label>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="cancel" data-toggle="tooltip" title="Cancel avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                            <span class="btn btn-xs btn-icon btn-circle btn-white btn-hover-text-primary btn-shadow" data-action="remove" data-toggle="tooltip" title="Remove avatar">
                                                <i class="ki ki-bold-close icon-xs text-muted"></i>
                                            </span>
                                        </div>
                                        <span class="form-text text-muted">Default empty input with blank image</span>
                                    </div>
                                </div>
                            </div>
                            <!--end::Input-->
                        </div>
                        <div class="card card-custom col-lg-12">
                            <div class="card-header">
                                <h3 class="card-title">Documents</h3>
                            </div>
                            <!--begin::Form-->
                            <div class="card-body">

                                <div id="kt_repeater">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Document title:</label>
                                        <div data-repeater-list="" class="col-lg-9">
                                            @foreach($items['expatDocument'] as $doc)
                                                <div data-repeater-item="" class="form-group row" id="data_{{$doc['id']}}">
                                                    <div class="col-lg-5">
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="document_title" placeholder="Document" value="{{$doc['document_name']}}" />
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <a href="../../../{{$doc['image']}}" target="_blank">
                                                        <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url({{isset($doc['image'])?asset($doc['image']):url('/assets/media/misc/blank.jpg')}});">
                                                            <div class="image-input-wrapper"></div>
                                                        </div>
                                                        {{--<a href="../../../{{$doc['image']}}" target="_blank" class="btn btn-primary font-weight-bold text-uppercase px-4 py-2">View File</a>--}}
                                                    </div>
                                                    <div class="col-lg-1">
                                                        <a href="javascript:;" onclick="if(confirm('Are you sure you want to delete this element?')) deleteDocument('{{$doc['id']}}')" data-repeater-delete="" class="btn font-weight-bold btn-danger btn-icon">
                                                            <i class="la la-remove"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>

                                <div id="kt_repeater_3">
                                    <div class="form-group row">
                                        <label class="col-lg-3 col-form-label text-right">Document title:</label>
                                        <div data-repeater-list="doc_info" class="col-lg-9">
                                            <div data-repeater-item="" class="form-group row">
                                                <div class="col-lg-5">
                                                    <div class="input-group">
                                                        <input type="text" class="form-control" name="title" placeholder="Document" />
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <input type="file" name="file"/>
                                                </div>
                                                <div class="col-lg-1">
                                                    <a href="javascript:;" data-repeater-delete="" class="btn font-weight-bold btn-danger btn-icon">
                                                        <i class="la la-remove"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-lg-3"></div>
                                        <div class="col">
                                            <div data-repeater-create="" class="btn font-weight-bold btn-primary">
                                                <i class="la la-plus"></i>Add</div>
                                        </div>
                                    </div>
                                </div>
                                <!--end: Code-->
                            </div>
                            <!--end::Form-->
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-10">
                                <button type="submit" class="btn btn-success mr-2">Submit</button>
                                <button type="reset" class="btn btn-secondary">Reset</button>
                                <a href="{{ url('admin/userinfo/'.$items['id']) }}" class="btn btn-danger">Cancel</a>
                            </div>
                        </div>
                    </div>
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

    // On load functions here
        $(document).ready(function () {
            if($('.per_division').val()){
                var l = window.location;
                var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
                loadData({{isset($items['bdPermanentAddress']['division_id'])?$items['bdPermanentAddress']['division_id']:'0'}}, base_url + '/public/address/district_by_division?division_id=', '.per_district', {{isset($items['bdPermanentAddress']['district_id'])?$items['bdPermanentAddress']['district_id']:'0'}})
            }
            if($('.per_district').val()){
                var l = window.location;
                var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
                loadData({{isset($items['bdPermanentAddress']['district_id'])?$items['bdPermanentAddress']['district_id']:'0'}}, base_url + '/public/address/upazila_by_district?district_id=', '.per_upazila', {{isset($items['bdPermanentAddress']['upazila_id'])?$items['bdPermanentAddress']['upazila_id']:'0'}})
            }
            if($('.per_upazila').val()){
                var l = window.location;
                var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
                loadData({{isset($items['bdPermanentAddress']['upazila_id'])?$items['bdPermanentAddress']['upazila_id']:'0'}}, base_url + '/public/address/union_by_upazila?upazila_id=', '.per_union', {{isset($items['bdPermanentAddress']['union_id'])?$items['bdPermanentAddress']['union_id']:'0'}})
            }
            if($('.mail_division').val()){
                var l = window.location;
                var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
                loadData({{isset($items['bdPresentAddress']['division_id'])?$items['bdPresentAddress']['division_id']:'0'}}, base_url + '/public/address/district_by_division?division_id=', '.mail_district', {{isset($items['bdPresentAddress']['district_id'])?$items['bdPresentAddress']['district_id']:'0'}})
            }
            if($('.mail_district').val()){
                var l = window.location;
                var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
                loadData({{isset($items['bdPresentAddress']['district_id'])?$items['bdPresentAddress']['district_id']:'0'}}, base_url + '/public/address/upazila_by_district?district_id=', '.mail_upazila', {{isset($items['bdPresentAddress']['upazila_id'])?$items['bdPresentAddress']['upazila_id']:'0'}})
            }
            if($('.mail_upazila').val()){
                var l = window.location;
                var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
                loadData({{isset($items['bdPresentAddress']['upazila_id'])?$items['bdPresentAddress']['upazila_id']:'0'}}, base_url + '/public/address/union_by_upazila?upazila_id=', '.mail_union', {{isset($items['bdPresentAddress']['union_id'])?$items['bdPresentAddress']['union_id']:'0'}})
            }
        });

    // On change functions here
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

        function loadData(id, url, className, currently_selected) {
            console.log(id);
            // console.log(url);
            // console.log(className);
            // console.log(currently_selected);
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
                                    if(el.id == currently_selected){
                                        return '<option value="' + el.id + '"' + 'selected>' + el.title_en + '</option>';
                                    } else {
                                        return '<option value=' + el.id + '>' + el.title_en + '</option>';
                                    }

                                });
                            }
                        );
                        jQuery(className).removeAttr('disabled');
                    }
                }
            });
        }

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

        function deleteDocument(id){
            var l = window.location;
            var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
            jQuery.ajax({
                type: "GET",
                url: base_url + '/public/admin/expatriate/' + id + '/deleteDocument/',
                dataType: "JSON",
                success: function(data) {
                    if (data !== '') {
                        $('#data_' + id).slideUp();
                        return True;
                    } else {
                        return False;
                    }
                }
            });
        }
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
