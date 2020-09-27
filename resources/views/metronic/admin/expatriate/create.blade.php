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
                <h5 class="text-dark font-weight-bold my-2 mr-5">User List</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/user') }}" class="text-muted">Expatriate</a>
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
                <!--begin::Wizard-->
                <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first" data-wizard-clickable="false">
                    <!--begin::Wizard Nav-->
                    <div class="wizard-nav border-bottom">
                        <div class="wizard-steps p-8 p-lg-10">
                            <!--begin::Wizard Step 1 Nav-->
                            <div class="wizard-step" data-wizard-type="step" data-wizard-state="current">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-profile"></i>
                                    <h3 class="wizard-title">1. Personal Information</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path
                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Wizard Step 1 Nav-->
                            <!--begin::Wizard Step 2 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-paper-plane"></i>
                                    <h3 class="wizard-title">2. Visa & Arrival Info</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path
                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Wizard Step 2 Nav-->
                            <!--begin::Wizard Step 3 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-profile-1"></i>
                                    <h3 class="wizard-title">3. Employment Information</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path
                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Wizard Step 3 Nav-->
                            <!--begin::Wizard Step 4 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-coins"></i>
                                    <h3 class="wizard-title">4. Financial Information</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path
                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Wizard Step 4 Nav-->
                            <!--begin::Wizard Step 5 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-mail-1"></i>
                                    <h3 class="wizard-title">5. Contact Info</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow last">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path
                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Wizard Step 5 Nav-->
                            <!--begin::Wizard Step 6 Nav-->
                            <div class="wizard-step" data-wizard-type="step">
                                <div class="wizard-label">
                                    <i class="wizard-icon flaticon-file-2"></i>
                                    <h3 class="wizard-title">6. Documents and Others</h3>
                                </div>
                                <span class="svg-icon svg-icon-xl wizard-arrow last">
                                    <!--begin::Svg Icon | path:assets/media/svg/icons/Navigation/Arrow-right.svg-->
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24" />
                                            <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 12.000000) rotate(-90.000000) translate(-12.000000, -12.000000)" x="11" y="5" width="2" height="14" rx="1" />
                                            <path
                                                d="M9.70710318,15.7071045 C9.31657888,16.0976288 8.68341391,16.0976288 8.29288961,15.7071045 C7.90236532,15.3165802 7.90236532,14.6834152 8.29288961,14.2928909 L14.2928896,8.29289093 C14.6714686,7.914312 15.281055,7.90106637 15.675721,8.26284357 L21.675721,13.7628436 C22.08284,14.136036 22.1103429,14.7686034 21.7371505,15.1757223 C21.3639581,15.5828413 20.7313908,15.6103443 20.3242718,15.2371519 L15.0300721,10.3841355 L9.70710318,15.7071045 Z"
                                                fill="#000000" fill-rule="nonzero" transform="translate(14.999999, 11.999997) scale(1, -1) rotate(90.000000) translate(-14.999999, -11.999997)" />
                                        </g>
                                    </svg>
                                    <!--end::Svg Icon-->
                                </span>
                            </div>
                            <!--end::Wizard Step 6 Nav-->
                        </div>
                    </div>
                    <!--end::Wizard Nav-->
                    <!--begin::Wizard Body-->
                    <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                        <div class="col-xl-12">
                            <!--begin::Wizard Form-->
                            <form class="form form-horizontal basicInfo" id="kt_form" role="form" method="POST" name="basicInfo" action="{{ route('basic_info_create') }}" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <!--begin::Wizard Step 1-->
                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Passport Details</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label><mark style="color: red; background: white">*</mark>Passport Number:</label>
                                                        <div class="input-group date">
                                                            <input name="passport_number" type="text" class="form-control form-control-solid" placeholder="Enter passport number" style="width: 90%" />
                                                            <label class="btn btn-default">
                                                                <span class="flaticon-upload" id="icon-style" style="font-size: 20px"> <input name="passport_image" id="passport_image" type="file" hidden></span>
                                                            </label>
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your passport number</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Issue Date:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="passport_issue_date" type="text" class="form-control form-control-solid" placeholder="Enter issue date" id="kt_datepicker_3" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your passport's issue date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label><mark style="color: red; background: white">*</mark>Expiry Date:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="passport_expiry_date" type="text" class="form-control form-control-solid" placeholder="Enter expiry date" id="kt_datepicker_3" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your passport's expiry date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Issue Place:</label>
                                                        <input name="passport_issue_place" type="text" class="form-control form-control-solid" placeholder="Enter issue place" />
                                                        {{-- <span class="form-text text-muted">Please enter your passport issued place</span> --}}
                                                    </div>
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Basic Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label><mark style="color: red; background: white">*</mark>First Name:</label>
                                                        <input name="first_name" type="text" class="form-control form-control-solid" placeholder="Enter first name" />
                                                        {{-- <span class="form-text text-muted">Please enter your first name</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Last Name:</label>
                                                        <input name="last_name" type="text" class="form-control form-control-solid" placeholder="Enter last name" />
                                                        {{-- <span class="form-text text-muted">Please enter your last name</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Father's Name:</label>
                                                        <input name="father_name" type="text" class="form-control form-control-solid" placeholder="Enter father's name" />
                                                        {{-- <span class="form-text text-muted">Please enter your father's name</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Mother's Name:</label>
                                                        <input name="mother_name" type="text" class="form-control form-control-solid" placeholder="Enter mother's name" />
                                                        {{-- <span class="form-text text-muted">Please enter your mother's name</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Maritial Status:</label>
                                                        <select class="form-control martial_status" id="kt_select_1" name="marital_status" required>
                                                            <option value="1">bachelor</option>
                                                            <option value="2">Married</option>
                                                            <option value="3">Divorsed</option>
                                                        </select>
                                                        {{-- <span class="form-text text-muted">Please enter your martial status</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Spouse's Name:</label>
                                                        <input name="spouse_name" type="text" class="form-control form-control-solid" placeholder="Enter spouse's name" />
                                                        {{-- <span class="form-text text-muted">Please enter your spouse's name</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Nationality:</label>
                                                        <select class="form-control nationality" id="kt_select_1" name="nationality" required>
                                                            @foreach ($country as $nationality)
                                                            <option value="{{ $nationality['id'] }}">
                                                                {{ $nationality['title'] }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="form-text text-muted">Please enter your nationality</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>National ID:</label>
                                                        <input name="nid" type="text" class="form-control form-control-solid" placeholder="Enter national id number" />
                                                        {{-- <span class="form-text text-muted">Please enter your national id number</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Date of Birth:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="date_of_birth" type="text" class="form-control form-control-solid" placeholder="Enter date of birth" id="kt_datepicker_3" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your date of birth</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Birth Place:</label>
                                                        <select class="form-control birth_country" id="kt_select_1" name="birth_country_id" required>
                                                            @foreach ($country as $birth_place)
                                                            <option value="{{ $birth_place['id'] }}">
                                                                {{ $birth_place['title'] }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="form-text text-muted">Please enter your place of birth</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Gender:</label>
                                                        <select class="form-control gender" id="kt_select_1" name="gender" required>
                                                            <option value='null'>Select Gender</option>
                                                            @foreach ($gender as $gender)
                                                            <option value="{{ $gender['id'] }}">
                                                                {{ $gender['title'] }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="form-text text-muted">Please enter your spouse's name</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Religion:</label>
                                                        <select class="form-control religion" id="kt_select_1" name="religion_id" required>
                                                            <option value='null'>Select Religion</option>
                                                            @foreach ($religion as $religion)
                                                            <option value="{{ $religion['id'] }}">
                                                                {{ $religion['title'] }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="form-text text-muted">Please enter your religion</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input name="email" type="email" class="form-control form-control-solid" placeholder="Enter your email" />
                                                        {{-- --}}
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Contact Number:</label>
                                                        <input name="mobile" type="text" class="form-control form-control-solid" placeholder="Enter contact number" />
                                                        {{-- <span class="form-text text-muted">Please enter your contact number</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Social Network Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <label>Line ID:</label>
                                                    <input name="line_id" type="text" class="form-control form-control-solid" placeholder="Enter Line ID" />
                                                    {{-- <span class="form-text text-muted">Please enter your line account id</span> --}}
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <label>Facebook ID:</label>
                                                    <input name="facebook_id" type="text" class="form-control form-control-solid" placeholder="Enter facebook id" />
                                                    {{-- <span class="form-text text-muted">Please enter your facebook account id</span> --}}
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <label>Whatsapp ID:</label>
                                                    <input name="whatsapp_id" type="text" class="form-control form-control-solid" placeholder="Enter Whatsapp ID" />
                                                    {{-- <span class="form-text text-muted">Please enter your whatsapp account id</span> --}}
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <label>Linkedin ID:</label>
                                                    <input name="linkedin_id" type="text" class="form-control form-control-solid" placeholder="Enter Linkedin id" />
                                                    {{-- <span class="form-text text-muted">Please enter your linkedin account id</span> --}}
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Arrival Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Entry Date:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="arrival_date" type="text" class="form-control form-control-solid" placeholder="Enter arrival date" id="kt_datepicker_3" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Arrival Country:</label>
                                                        <select class="form-control arrival_country" id="kt_select_5" name="arrival_country_id" required>
                                                            <option value='null'>Select Country</option>
                                                            @foreach ($countries as $country)
                                                            <option value="{{ $country['id'] }}">
                                                                {{ $country['title'] }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Airport IATA Code:</label>
                                                        <input name="arrival_iata_code" type="text" class="form-control form-control-solid" placeholder="Enter airport iata code" />
                                                        {{-- <span class="form-text text-muted">Please enter airport iata code</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Immigration Endorsement Date:</label>
                                                        <div class="input-group date mb-2" style="width: 98%">
                                                            <input name="immigration_endorsement_date" type="text" class="form-control form-control-solid" placeholder="Enter immigration endorsement date" id="kt_datepicker_3" />
                                                            <label class="btn btn-default">
                                                                <span class="flaticon-upload" style="font-size: 20px"> <input type="file" hidden></span>
                                                            </label>
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                                    </div>
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Visa Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label><mark style="color: red; background: white">*</mark>Visa Type:</label>
                                                        <div class="input-group date mb-2" style="width: 98%">
                                                            <input name="visa_type" type="text" class="form-control form-control-solid" placeholder="Enter visa type" />
                                                            <label class="btn btn-default">
                                                                <span class="flaticon-upload" style="font-size: 20px"> <input type="file" hidden></span>
                                                            </label>
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter visa type</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Entries:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="entries" type="text" class="form-control form-control-solid" placeholder="Enter entries" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter entries</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Issue Date:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="visa_issue_date" type="text" class="form-control form-control-solid" placeholder="Enter issue date" id="kt_datepicker_3" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter visa issue date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    {{-- <div class="form-group">
                                                                            <label><mark style="color: red; background: white">*</mark>First Name:</label>
                                                                            <input name="first_name" type="text" class="form-control form-control-solid" placeholder="Enter first name" />
                                                                        </div> --}}
                                                    <div class="form-group">
                                                        <label><mark style="color: red; background: white">*</mark>Expiry Date:</label>
                                                        <input name="visa_expiry_date" type="text" class="form-control form-control-solid" placeholder="Enter expiry date" id="kt_datepicker_3" />
                                                        {{-- <span class="form-text text-muted">Please enter visa expiry date</span> --}}
                                                    </div>
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Departure Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Departure Country:</label>
                                                        <select class="form-control departure_country" id="kt_select_6" name="departure_country_id" required>
                                                            <option value='null'>Select Country</option>
                                                            @foreach ($countries as $country)
                                                            <option value="{{ $country['id'] }}">
                                                                {{ $country['title'] }}
                                                            </option>
                                                            @endforeach
                                                        </select>
                                                        {{-- <span class="form-text text-muted">Please enter departure country</span> --}}
                                                    </div>
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Return Date:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="return_date" type="text" class="form-control form-control-solid" placeholder="Enter return date" id="kt_datepicker_3" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter return date</span> --}}
                                                    </div>
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Airport IATA Code:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="departure_iata_code" type="text" class="form-control form-control-solid" placeholder="Enter departure iata code" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter departure airport's iata code</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Immigration Endorsement Date:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="immigration_endorsement_date" type="text" class="form-control form-control-solid" placeholder="Enter immigration endorsement date" id="kt_datepicker_3" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                                    </div>
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">BMET Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label><mark style="color: red; background: white">*</mark>BMET Smart Card Number:</label>
                                                        <div class="input-group date">
                                                            <input name="bmet_number" type="text" class="form-control form-control-solid" placeholder="Enter BMET Smart Card Number" />
                                                            <label class="btn btn-default">
                                                                <span class="flaticon-upload" id="icon-style" style="font-size: 20px"> <input name="bmet_file" id="bmet_image" type="file" hidden></span>
                                                            </label>
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your passport number</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Category of Worker:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="worker_category_id" type="text" class="form-control form-control-solid" placeholder="Enter Category of Worker" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Ministry Approval Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Memo Number:</label>
                                                        <div class="input-group date mb-2" style="width: 98%">
                                                            <input name="memo_number" type="text" class="form-control form-control-solid" placeholder="Enter Memo Number" />
                                                            <label class="btn btn-default">
                                                                <span class="flaticon-upload" style="font-size: 20px"> <input name="ministry_approval_file" type="file" hidden></span>
                                                            </label>
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter airport iata code</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Issue Date:</label>
                                                        <input name="ministry_approval_issue_date" type="text" class="form-control form-control-solid" placeholder="Enter issue date" id="kt_datepicker_3" />
                                                    </div>
                                                    {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Work Permit Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <div class="input-group date mb-2" style="width: 98%">
                                                            <input name="work_place_email" type="email" class="form-control form-control-solid" placeholder="Enter your work place email" />
                                                            <label class="btn btn-default">
                                                                <span class="flaticon-upload" style="font-size: 20px"> <input name="work_permit_file" type="file" hidden></span>
                                                            </label>
                                                        {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                                        </div>
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Contact Number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="work_place_mobile" type="text" class="form-control form-control-solid" placeholder="Enter your work place contact number" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter entries</span> --}}
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
                                                            <input name="work_place_address" type="text" class="form-control form-control-solid" placeholder="Enter your work place address" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter visa issue date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Mother Company's Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input name="mother_company_name" class="form-control form-control-solid" placeholder="Enter your mother company's name" />
                                                        {{-- {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Business Type:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="mother_company_business_type" type="text" class="form-control form-control-solid" placeholder="Enter your mother company's business type" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter entries</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input name="mother_company_email" type="email" class="form-control form-control-solid" placeholder="Enter your mother company's email" />
                                                        {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Contact Number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="mother_company_mobile" type="text" class="form-control form-control-solid" placeholder="Enter your mother company's contact number" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter entries</span> --}}
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
                                                            <input name="mother_company_address" type="text" class="form-control form-control-solid" placeholder="Enter your mother company's address" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter visa issue date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Supplier Company Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input name="supplier_company_name" class="form-control form-control-solid" placeholder="Enter your supplier company's name" />
                                                        {{-- {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Business Type:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="supplier_company_business_type" type="text" class="form-control form-control-solid" placeholder="Enter your supplier company's business type" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter entries</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input name="supplier_company_email" type="email" class="form-control form-control-solid" placeholder="Enter your supplier company's email" />
                                                        {{-- {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Contact Number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="supplier_company_mobile" type="text" class="form-control form-control-solid" placeholder="Enter your supplier company's contact number" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter entries</span> --}}
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
                                                            <input name="supplier_company_address" type="text" class="form-control form-control-solid" placeholder="Enter your supplier company's address" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter visa issue date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Recruiting Agency Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Name:</label>
                                                        <input name="recruiting_agency_name" class="form-control form-control-solid" placeholder="Enter your recruiting agency's name" />
                                                        {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Business Type:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="recruiting_agency_rl_number" type="text" class="form-control form-control-solid" placeholder="Enter your  recruiting agency's business type" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter entries</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Email:</label>
                                                        <input name="recruiting_agency_email" type="email" class="form-control form-control-solid" placeholder="Enter your recruiting agency's email" />
                                                        {{-- {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Contact Number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="recruiting_agency_mobile" type="text" class="form-control form-control-solid" placeholder="Enter your recruiting agency's contact number" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter entries</span> --}}
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
                                                            <input name="recruiting_agency_address" type="text" class="form-control form-control-solid" placeholder="Enter your recruiting agency's address" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter visa issue date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="pb-5" data-wizard-type="step-content">
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Salary Information</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label><mark style="color: red; background: white">*</mark>Salary/Wage:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="salary_amount" type="text" class="form-control form-control-solid" placeholder="Enter salary/wage" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Currency:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="salary_currency_id" type="text" class="form-control form-control-solid" placeholder="Enter Currency" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Bank Account Information(Current Country)</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Account Name:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="current_country_bank_account_name" type="text" class="form-control form-control-solid" placeholder="Enter Account Name" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Account Number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="current_country_bank_account_number" type="text" class="form-control form-control-solid" placeholder="Enter Account Number" />
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
                                                        <label>Bank Name:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="current_country_bank_name" type="text" class="form-control form-control-solid" placeholder="Enter Bank Name" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Branch Name:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="current_country_branch_name" type="text" class="form-control form-control-solid" placeholder="Enter Branch Name" />
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
                                                        <label>Routing Number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="current_country_routing_number" type="text" class="form-control form-control-solid" placeholder="Enter Routing Number" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Swift:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="current_country_swift" type="text" class="form-control form-control-solid" placeholder="Enter swift" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-custom gutter-b" style="margin: 25px 0">
                                        <div class="card-header">
                                            <h3 class="card-title">Bank Account(Bangladesh)</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-xl-6">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Account Name:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="bd_bank_account_name" type="text" class="form-control form-control-solid" placeholder="Enter Account Name" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Account Number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="bd_bank_account_number" type="text" class="form-control form-control-solid" placeholder="Enter Account Number" />
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
                                                        <label>Bank Name:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="bd_bank_name" type="text" class="form-control form-control-solid" placeholder="Enter Bank Name" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Branch Name:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="bd_branch_name" type="text" class="form-control form-control-solid" placeholder="Enter Branch Name" />
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
                                                        <label>Routing Number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="bd_routing_number" type="text" class="form-control form-control-solid" placeholder="Enter Routing Number" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-xl-6">
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Swift:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="bd_swift" type="text" class="form-control form-control-solid" placeholder="Enter swift" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                                    <!--end::Select-->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                            <input name="flat_no" type="text" class="form-control form-control-solid" placeholder="Enter flat number" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Holding/House number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="house_no" type="text" class="form-control form-control-solid" placeholder="Enter holding/house number" />
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
                                                            <input name="street" type="text" class="form-control form-control-solid" placeholder="Enter street name" />
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
                                                            <input name="area" type="text" class="form-control form-control-solid" placeholder="Enter area name" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Post Code:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="post_code" type="text" class="form-control form-control-solid" placeholder="Enter post code" />
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
                                                            <input name="city" type="text" class="form-control form-control-solid" placeholder="Enter city name" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Country:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="country" type="text" class="form-control form-control-solid" placeholder="Enter country" />
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
                                                            <input name="current_email" type="email" class="form-control form-control-solid" placeholder="Enter your current country email" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Contact Number:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="current_mobile" type="text" class="form-control form-control-solid" placeholder="Enter contact number" />
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
                                                            <input name="emg_name" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's name" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Relationship:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="emg_relation" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's relation" />
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
                                                            <input name="emg_email" type="email" class="form-control form-control-solid" placeholder="Enter emergency contact's email" />
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
                                                            <input name="emg_mobile" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's number" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-8">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Address:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="emg_address" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's address" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Post Code:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="emg_post_code" type="text" class="form-control form-control-solid" placeholder="Enter post code" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
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
                                                            <input name="permanent_street_name" type="text" class="form-control form-control-solid" placeholder="Enter street/para" />
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
                                                        <select class="form-control per_division" id="kt_select_1" name="permanent_division_id" required>
                                                            <option value='null'>Select Division</option>
                                                            @foreach ($divisions as $division)
                                                            <option value="{{ $division['id'] }}">
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
                                                        <select class="form-control per_district" id="kt_select_1" name="permanent_district_id" required>
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
                                                        <select class="form-control per_upazila" id="kt_select_1" name="permanent_thana_id" required>
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
                                                        <select class="form-control per_union" id="kt_select_1" name="permanent_union_id" required>
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
                                                            <input name="permanent_area" type="text" class="form-control form-control-solid" placeholder="Enter area/village" />
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
                                                            <input name="permanent_post_office" type="text" class="form-control form-control-solid" placeholder="Enter post office" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                                    <!--end::Select-->
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
                                                            <input name="mailing_street_name" type="text" class="form-control form-control-solid" placeholder="Enter street/para" />
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
                                                        <select class="form-control per_division" id="kt_select_1" name="mailing_division_id" required>
                                                            <option value='null'>Select Division</option>
                                                            @foreach ($divisions as $division)
                                                            <option value="{{ $division['id'] }}">
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
                                                        <select class="form-control per_district" id="kt_select_1" name="mailing_district_id" required>
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
                                                        <select class="form-control per_upazila" id="kt_select_1" name="mailing_thana_id" required>
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
                                                        <select class="form-control per_union" id="kt_select_1" name="mailing_union_id" required>
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
                                                            <input name="mailing_area" type="text" class="form-control form-control-solid" placeholder="Enter area/village" />
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
                                                            <input name="mailing_post_office" type="text" class="form-control form-control-solid" placeholder="Enter post office" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    {{-- <span class="form-text text-muted">Please enter immigration endorsement date</span> --}}
                                                    <!--end::Select-->
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
                                                            <input name="bd_emg_name" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's name" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Relationship:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="bd_emg_relation" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's relation" />
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
                                                            <input name="bd_emg_email" type="email" class="form-control form-control-solid" placeholder="Enter emergency contact's email" />
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
                                                            <input name="bd_emg_mobile" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's number" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xl-8">
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Address:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="bd_emg_address" type="text" class="form-control form-control-solid" placeholder="Enter emergency contact's address" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                    <!--end::Input-->
                                                </div>
                                                <div class="col-lg-4">
                                                    <div class="form-group">
                                                        <label>Post Code:</label>
                                                        <div class="input-group date mb-2">
                                                            <input name="bd_emg_post_code" type="text" class="form-control form-control-solid" placeholder="Enter post code" />
                                                        </div>
                                                        {{-- <span class="form-text text-muted">Please enter your arrival country</span> --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                    <div class="image-input image-input-empty image-input-outline" id="kt_image_5" style="background-image: url('/img/blank.jpg');">
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

                                            <div id="kt_repeater_3">
                                                <div class="form-group row">
                                                    <label class="col-lg-3 col-form-label text-right">Document title:</label>
                                                    <div data-repeater-list="" class="col-lg-9">
                                                        <div data-repeater-item="" class="form-group row">
                                                            <div class="col-lg-5">
                                                                <div class="input-group">
                                                                    <input type="text" class="form-control" placeholder="Document" />
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <input type="file" name=""/>
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

                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                    <div class="mr-2">
                                        <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                    </div>
                                    <div>
                                        <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-submit">Submit</button>
                                        <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">Next Step</button>
                                    </div>
                                </div>
                            </form>
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
        setData($(this).val(), base_url + '/../address/district_by_division?division_id=', '.per_district')
    });

    $('.per_district').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/../address/upazila_by_district?district_id=', '.per_upazila')
    });

    $('.per_upazila').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/../address/union_by_upazila?upazila_id=', '.per_union')
    });

    $('.mail_division').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/../address/district_by_division?division_id=', '.mail_district')
    });

    $('.mail_district').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/../address/upazila_by_district?district_id=', '.mail_upazila')
    });

    $('.mail_upazila').on('change', function() {
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        setData($(this).val(), base_url + '/../address/union_by_upazila?upazila_id=', '.mail_union')
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
