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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Contact Information</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Contact Information</a>
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

                    <!--begin::Form-->
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('personal_data_update',$items['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
                    <div class="pb-5" data-wizard-type="step-content">
                        <div class="card card-custom gutter-b" style="margin: 25px 0">
                            <div class="card-header">
                                <h3 class="card-title">Address (Current Country)</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Flat Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_addr_flat_number" type="text" class="form-control form-control-solid" placeholder="Enter flat number" value="{{isset($items['current_country_address']['flat_number'])?$items['current_country_address']['flat_number']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Holding/House number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_addr_holding_number" type="text" class="form-control form-control-solid" placeholder="Enter holding/house number" value="{{isset($items['current_country_address']['holding_number'])?$items['current_country_address']['holding_number']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Street:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_addr_street_number" type="text" class="form-control form-control-solid" placeholder="Enter street name" value="{{isset($items['current_country_address']['street'])?$items['current_country_address']['street']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Area:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_addr_area" type="text" class="form-control form-control-solid" placeholder="Enter area name" value="{{isset($items['current_country_address']['area'])?$items['current_country_address']['area']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Post Code:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_addr_post_code" type="text" class="form-control form-control-solid" placeholder="Enter post code" value="{{isset($items['current_country_address']['post_code'])?$items['current_country_address']['post_code']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>City:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_addr_city" type="text" class="form-control form-control-solid" placeholder="Enter city name" value="{{isset($items['current_country_address']['city'])?$items['current_country_address']['city']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Country:</label>

                                            <div class="input-group date mb-2">
                                                <select name="cur_country_addr_country_id" class="form-control current_country" id="kt_select_5">
                                                    <option value='null'>Select Country</option>
                                                    @foreach ($countries as $country)
                                                        <option value="{{ $country['id'] }}" {{($items['current_country_address']['country_id'] == $country['id'])?'selected':''}}>
                                                            {{ $country['title'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_addr_email" type="text" class="form-control form-control-solid" placeholder="Enter your current country email" value="{{isset($items['current_country_address']['email'])?$items['current_country_address']['email']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_addr_mobile" type="text" class="form-control form-control-solid" placeholder="Enter contact number" value="{{isset($items['current_country_address']['mobile'])?$items['current_country_address']['mobile']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-custom gutter-b" style="margin: 25px 0">
                            <div class="card-header">
                                <h3 class="card-title">Emergency Contact(Current Country)</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_emergency_name" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's name" value="{{isset($items['current_country_emergency']['name'])?$items['current_country_emergency']['name']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Relationship:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_emergency_relation" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's relation" value="{{isset($items['current_country_emergency']['relation'])?$items['current_country_emergency']['relation']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_emergency_email" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's email" value="{{isset($items['current_country_emergency']['email'])?$items['current_country_emergency']['email']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_emergency_mobile" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's number" value="{{isset($items['current_country_emergency']['mobile'])?$items['current_country_emergency']['mobile']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <div class="input-group date mb-2">
                                                <input name="cur_country_emergency_address" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's address" value="{{isset($items['current_country_emergency']['address'])?$items['current_country_emergency']['address']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="card card-custom gutter-b" style="margin: 25px 0">
                            <div class="card-header">
                                <h3 class="card-title">Permanent Address(Bangladesh)</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Street/Para:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_per_street" type="text" class="form-control form-control-solid" placeholder="Enter street/para" value="{{isset($items['bdPermanentAddress']['street'])?$items['bdPermanentAddress']['street']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Division:</label>
                                            <select class="form-control per_division" id="kt_select_1" name="bd_per_division_id">
                                                <option value='null'>Select Division</option>
                                                @foreach ($divisions as $division)
                                                    <?php
                                                    $bd_permanent_selected_division = isset($items['bdPermanentAddress']['division_id'])?$items['bdPermanentAddress']['division_id']:'';
                                                    ?>
                                                <option value="{{ $division['id'] }}" {{($bd_permanent_selected_division == $division['id'])?'selected':''}}>
                                                    {{ $division['title_en'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Select-->
                                        <div class="form-group">
                                            <label>Dristrict:</label>
                                            <select class="form-control per_district" id="kt_select_1" name="bd_per_district_id" value="{{isset($items['bdPermanentAddress']['district_id'])?$items['bdPermanentAddress']['district_id']:''}}">
                                                <option value='null'>Select District</option>
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                        <!--end::Select-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Thana/Upazilla:</label>
                                            <select class="form-control per_upazila" id="kt_select_1" name="bd_per_upazila_id" value="{{isset($items['bdPermanentAddress']['upazila_id'])?:''}}">
                                                <option value='null'>Select Thana/Upazilla</option>
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Select-->
                                        <div class="form-group">
                                            <label>Word/Union:</label>
                                            <select class="form-control per_union" id="kt_select_1" name="bd_per_union_id" value="{{isset($items['bdPermanentAddress']['union_id'])?:''}}">
                                                <option value='null'>Select Word/Union</option>
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                        <!--end::Select-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Area/Village:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_per_area" type="text" class="form-control form-control-solid" placeholder="Enter area/village" value="{{isset($items['bdPermanentAddress']['area'])?$items['bdPermanentAddress']['area']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Select-->
                                        <div class="form-group">
                                            <label>Post Office:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_per_post_office" type="text" class="form-control form-control-solid" placeholder="Enter post office" value="{{isset($items['bdPermanentAddress']['post_office'])?$items['bdPermanentAddress']['post_office']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                        <!--end::Select-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_per_email" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's email" value="{{isset($items['bdPermanentAddress']['email'])?$items['bdPermanentAddress']['email']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_per_mobile" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's number" value="{{isset($items['bdPermanentAddress']['mobile'])?$items['bdPermanentAddress']['mobile']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-custom gutter-b" style="margin: 25px 0">
                            <div class="card-header">
                                <h3 class="card-title">Mailing Address(Bangladesh)</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Street/Para:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_present_street" type="text" class="form-control form-control-solid" placeholder="Enter street/para" value="{{isset($items['bdPresentAddress']['street'])?$items['bdPresentAddress']['street']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Division:</label>
                                            <select class="form-control mail_division" id="kt_select_1" name="bd_present_division_id">
                                                <option value='null'>Select Division</option>
                                                @foreach ($divisions as $division)
                                                <option value="{{ $division['id'] }}" {{($items['bdPresentAddress']['division_id'] == $division['id'])?'selected':''}}>
                                                    {{ $division['title_en'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Select-->
                                        <div class="form-group">
                                            <label>Dristrict:</label>
                                            <select class="form-control mail_district" id="kt_select_1" name="bd_present_district_id" value="{{isset($items['bdPresentAddress']['district_id'])?$items['bdPresentAddress']['district_id']:''}}">
                                                <option value='null'>Select District</option>
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                        <!--end::Select-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Thana/Upazilla:</label>
                                            <select class="form-control mail_upazila" id="kt_select_1" name="bd_present_upazila_id" value="{{isset($items['bdPresentAddress']['upazila_id'])?$items['bdPresentAddress']['upazila_id']:''}}">
                                                <option value='null'>Select Thana/Upazilla</option>
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Select-->
                                        <div class="form-group">
                                            <label>Word/Union:</label>
                                            <select class="form-control mail_union" id="kt_select_1" name="bd_present_union_id" value="{{isset($items['bdPresentAddress']['union_id'])?$items['bdPresentAddress']['union_id']:''}}">
                                                <option value='null'>Select Word/Union</option>
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                        <!--end::Select-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Area/Village:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_present_area" type="text" class="form-control form-control-solid" value="{{isset($items['bdPresentAddress']['area'])?$items['bdPresentAddress']['area']:''}}" placeholder="Enter area/village" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Select-->
                                        <div class="form-group">
                                            <label>Post Office:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_present_post_office" type="text" class="form-control form-control-solid" value="{{isset($items['bdPresentAddress']['post_office'])?$items['bdPresentAddress']['post_office']:''}}" placeholder="Enter post office" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                        <!--end::Select-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_present_email" type="text" class="form-control form-control-solid" value="{{isset($items['bdPresentAddress']['email'])?$items['bdPresentAddress']['email']:''}}" placeholder="Enter email" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_present_mobile" type="text" class="form-control form-control-solid" value="{{isset($items['bdPresentAddress']['mobile'])?$items['bdPresentAddress']['mobile']:''}}" placeholder="Enter contact number" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card card-custom gutter-b" style="margin: 25px 0">
                            <div class="card-header">
                                <h3 class="card-title">Emergency Contact(Bangladesh)</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Name:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_emergency_name" type="text" class="form-control form-control-solid" value="{{isset($items['bd_emergency']['name'])?$items['bd_emergency']['name']:''}}" placeholder="Enter emergency contact's name" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Relationship:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_emergency_relation" type="text" class="form-control form-control-solid" value="{{isset($items['bd_emergency']['relation'])?$items['bd_emergency']['relation']:''}}" placeholder="Enter emergency contact's relation" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_emergency_email" type="text" class="form-control form-control-solid" value="{{isset($items['bd_emergency']['email'])?$items['bd_emergency']['email']:''}}" placeholder="Enter emergency contact's email" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_emergency_mobile" type="text" class="form-control form-control-solid" value="{{isset($items['bd_emergency']['mobile'])?$items['bd_emergency']['mobile']:''}}" placeholder="Enter emergency contact's number" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Address:</label>
                                            <div class="input-group date mb-2">
                                                <input name="bd_emergency_address" type="text" class="form-control form-control-solid" value="{{isset($items['bd_emergency']['address'])?$items['bd_emergency']['address']:''}}" placeholder="Enter emergency contact's address" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                </div>
                            </div>
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

</script>
@endsection
