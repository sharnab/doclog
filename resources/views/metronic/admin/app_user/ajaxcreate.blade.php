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

<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="d-flex flex-row flex-column-fluid page">

        <!--begin::Wrapper-->
        <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper" style="padding: 0px">
            <!--begin::Content-->
            <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
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
                                        <a href="{{ url('admin/agency') }}" class="text-muted">User List</a>
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
                                                    <i class="wizard-icon flaticon-mail-1"></i>
                                                    <h3 class="wizard-title">4. Contact Info</h3>
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
                                                    <i class="wizard-icon flaticon-coins"></i>
                                                    <h3 class="wizard-title">5. Financial Information</h3>
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
                                        <div class="col-xl-12 col-xxl-7">
                                            <!--begin::Wizard Form-->
                                            <form class="form form-horizontal basicInfo" id="kt_form" role="form" method="POST" name="basicInfo" action="{{ route('basic_info_create') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <!--begin::Wizard Step 1-->
                                                <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                                    <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
                                                        <div class="card-header">
                                                            <h3 class="card-title">Passport Details</h3>
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="row">
                                                                {{-- <div class="form-group">
    																<label>Address Line 1</label>
    																<input type="text" class="form-control form-control-solid form-control-lg" name="address1" placeholder="Address Line 1" value="Address Line 1" />
    																<span class="form-text text-muted">Please enter your Address.</span>
    															</div> --}}
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

                                                    <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
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
                                                                        <select class="form-control religion" id="kt_select_1" name="gender" required>
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
                                                                        <input name="email" type="email" class="form-control form-control-solid" placeholder="Enter full name" />
                                                                        <span class="form-text text-muted">We'll never share your email with anyone else</span>
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

                                                    <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
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
                                            </form>
                                                <!--end::Wizard Step 1-->
                                                <!--begin::Wizard Step 2-->
                                            <form class="form form-horizontal visaNarrivalInfo" id="kt_form" role="form" method="POST" name="visaNarrivalInfo" action="{{ route('visa_info_create') }}" enctype="multipart/form-data">
                                                {{ csrf_field() }}
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
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
                                                                            <input name="entry_date" type="text" class="form-control form-control-solid" placeholder="Enter issue date" id="kt_datepicker_3" />
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
                                                                        <input name="arrival_iata" type="text" class="form-control form-control-solid" placeholder="Enter airport iata code" />
                                                                        {{-- <span class="form-text text-muted">Please enter airport iata code</span> --}}
                                                                    </div>
                                                                    <!--end::Input-->
                                                                </div>
                                                                <div class="col-xl-6">
                                                                    <!--begin::Select-->
                                                                    <div class="form-group">
                                                                        <label>Immigration Endorsement Date:</label>
                                                                        <div class="input-group date mb-2" style="width: 98%">
                                                                            <input name="immigration_date" type="text" class="form-control form-control-solid" placeholder="Enter immigration endorsement date" id="kt_datepicker_3" />
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
                                                    <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
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
                                                    <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
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
                                                <!--end::Wizard Step 2-->
                                                <!--begin::Wizard Step 3-->
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <h4 class="mb-10 font-weight-bold text-dark">Select your Services</h4>
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Delivery Type</label>
                                                        <select name="delivery" class="form-control form-control-solid form-control-lg">
                                                            <option value="">Select a Service Type Option</option>
                                                            <option value="overnight" selected="selected">Overnight Delivery (within 48 hours)</option>
                                                            <option value="express">Express Delivery (within 5 working days)</option>
                                                            <option value="basic">Basic Delivery (within 5 - 10 working days)</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Select-->
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Packaging Type</label>
                                                        <select name="packaging" class="form-control form-control-solid form-control-lg">
                                                            <option value="">Select a Packaging Type Option</option>
                                                            <option value="regular" selected="selected">Regular Packaging</option>
                                                            <option value="oversized">Oversized Packaging</option>
                                                            <option value="fragile">Fragile Packaging</option>
                                                            <option value="frozen">Frozen Packaging</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Select-->
                                                    <!--begin::Select-->
                                                    <div class="form-group">
                                                        <label>Preferred Delivery Window</label>
                                                        <select name="preferreddelivery" class="form-control form-control-solid form-control-lg">
                                                            <option value="">Select a Preferred Delivery Option</option>
                                                            <option value="morning" selected="selected">Morning Delivery (8:00AM - 11:00AM)</option>
                                                            <option value="afternoon">Afternoon Delivery (11:00AM - 3:00PM)</option>
                                                            <option value="evening">Evening Delivery (3:00PM - 7:00PM)</option>
                                                        </select>
                                                    </div>
                                                    <!--end::Select-->
                                                </div>
                                                <!--end::Wizard Step 3-->
                                                <!--begin::Wizard Step 4-->
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <h4 class="mb-10 font-weight-bold text-dark">Setup Your Delivery Location</h4>
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Address Line 1</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="locaddress1" placeholder="Address Line 1" value="Address Line 1" />
                                                        <span class="form-text text-muted">Please enter your Address.</span>
                                                    </div>
                                                    <!--end::Input-->
                                                    <!--begin::Input-->
                                                    <div class="form-group">
                                                        <label>Address Line 2</label>
                                                        <input type="text" class="form-control form-control-solid form-control-lg" name="locaddress2" placeholder="Address Line 2" value="Address Line 2" />
                                                        <span class="form-text text-muted">Please enter your Address.</span>
                                                    </div>
                                                    <!--end::Input-->
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>Postcode</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg" name="locpostcode" placeholder="Postcode" value="3072" />
                                                                <span class="form-text text-muted">Please enter your Postcode.</span>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>City</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg" name="loccity" placeholder="City" value="Preston" />
                                                                <span class="form-text text-muted">Please enter your City.</span>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-xl-6">
                                                            <!--begin::Input-->
                                                            <div class="form-group">
                                                                <label>State</label>
                                                                <input type="text" class="form-control form-control-solid form-control-lg" name="locstate" placeholder="State" value="VIC" />
                                                                <span class="form-text text-muted">Please enter your State.</span>
                                                            </div>
                                                            <!--end::Input-->
                                                        </div>
                                                        <div class="col-xl-6">
                                                            <!--begin::Select-->
                                                            <div class="form-group">
                                                                <label>Country</label>
                                                                <select name="loccountry" class="form-control form-control-solid form-control-lg">
                                                                    <option value='1'>Bangladesh</option>
                                                                </select>
                                                            </div>
                                                            <!--end::Select-->
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end::Wizard Step 4-->
                                                <!--begin::Wizard Step 5-->
                                                <div class="pb-5" data-wizard-type="step-content">
                                                    <!--begin::Section-->
                                                    <h4 class="mb-10 font-weight-bold text-dark">Review your Details and Submit</h4>
                                                    <h6 class="font-weight-bolder mb-3">Current Address:</h6>
                                                    <div class="text-dark-50 line-height-lg">
                                                        <div>Address Line 1</div>
                                                        <div>Address Line 2</div>
                                                        <div>Melbourne 3000, VIC, Australia</div>
                                                    </div>
                                                    <div class="separator separator-dashed my-5"></div>
                                                    <!--end::Section-->
                                                    <!--begin::Section-->
                                                    <h6 class="font-weight-bolder mb-3">Delivery Details:</h6>
                                                    <div class="text-dark-50 line-height-lg">
                                                        <div>Package: Complete Workstation (Monitor, Computer, Keyboard &amp; Mouse)</div>
                                                        <div>Weight: 25kg</div>
                                                        <div>Dimensions: 110cm (w) x 90cm (h) x 150cm (L)</div>
                                                    </div>
                                                    <div class="separator separator-dashed my-5"></div>
                                                    <!--end::Section-->
                                                    <!--begin::Section-->
                                                    <h6 class="font-weight-bolder mb-3">Delivery Service Type:</h6>
                                                    <div class="text-dark-50 line-height-lg">
                                                        <div>Overnight Delivery with Regular Packaging</div>
                                                        <div>Preferred Morning (8:00AM - 11:00AM) Delivery</div>
                                                    </div>
                                                    <div class="separator separator-dashed my-5"></div>
                                                    <!--end::Section-->
                                                    <!--begin::Section-->
                                                    <h6 class="font-weight-bolder mb-3">Delivery Address:</h6>
                                                    <div class="text-dark-50 line-height-lg">
                                                        <div>Address Line 1</div>
                                                        <div>Address Line 2</div>
                                                        <div>Preston 3072, VIC, Australia</div>
                                                    </div>
                                                    <!--end::Section-->
                                                </div>
                                                <!--end::Wizard Step 5-->
                                                <!--begin::Wizard Actions-->
                                                <div class="d-flex justify-content-between border-top mt-5 pt-10">
                                                    <div class="mr-2">
                                                        <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                                                    </div>
                                                    <div>
                                                        <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4 submit" data-wizard-type="action-next">Submit & Next</button>
                                                        {{-- <button class="btn btn-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">Next Step</button> --}}
                                                    </div>
                                                </div>
                                                <!--end::Wizard Actions-->
                                            </form>
                                            <!--end::Wizard Form-->
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
            </div>
            <!--end::Content-->

        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
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
    var id = '';
    $('.submit').on('click', function () {
        var submittedForm = $(this).closest('form').prev();
        var className = submittedForm.attr('class');
        if(className.search('basicInfo') > 0){
            let first_name = $('.basicInfo input[name=first_name]').val();
            let last_name = $('.basicInfo input[name=last_name]').val();
            let father_name = $('.basicInfo input[name=father_name]').val();
            let mother_name = $('.basicInfo input[name=mother_name]').val();
            let marital_status = $('.basicInfo input[name=marital_status]').val();
            let spouse_name = $('.basicInfo input[name=spouse_name]').val();
            let nid = $('.basicInfo input[name=nid]').val();
            let nationality = $('.basicInfo input[name=nationality]').val();

            let date_of_birth = '';
            if($('.basicInfo input[name=date_of_birth]').val() != ''){
                date_of_birth = formatDate($('.basicInfo input[name=date_of_birth]').val());
            }


            let birth_country_id = $('.basicInfo input[name=birth_country_id]').val();
            let gender = $('.basicInfo input[name=gender]').val();
            let religion_id = $('.basicInfo input[name=religion_id]').val();
            let email = $('.basicInfo input[name=email]').val();
            let mobile = $('.basicInfo input[name=mobile]').val();
            let passport_number = $('.basicInfo input[name=passport_number]').val();
            let passport_image = $('.basicInfo input[name=passport_image]').val();
            let passport_issue_date = '';

            if($('.basicInfo input[name=passport_issue_date]').val() != ''){
                passport_issue_date = formatDate($('.basicInfo input[name=passport_issue_date]').val());
            }

            let passport_expiry_date = formatDate($('.basicInfo input[name=passport_expiry_date]').val());
            let passport_issue_place = $('.basicInfo input[name=passport_issue_place]').val();
            let facebook_id = $('.basicInfo input[name=facebook_id]').val();
            let linkedin_id = $('.basicInfo input[name=linkedin_id]').val();
            let line_id = $('.basicInfo input[name=line_id]').val();
            let whatsapp_id = $('.basicInfo input[name=whatsapp_id]').val();
            let _token   = $('meta[name="csrf-token"]').attr('content');
            $.ajax({
                url: (!id) ? "/admin/expatriate/create_basic_info" : "/admin/expatriate/update_basic_info",
                type:(!id) ? "POST" : "PUT",
                data:{
                    first_name: first_name,
                    last_name: last_name,
                    father_name: father_name,
                    mother_name: mother_name,
                    marital_status: marital_status,
                    spouse_name: spouse_name,
                    nid: nid,
                    nationality: nationality,
                    date_of_birth: date_of_birth,
                    birth_country_id: birth_country_id,
                    gender: gender,
                    religion_id: religion_id,
                    email: email,
                    mobile: mobile,
                    passport_number: passport_number,
                    passport_image: passport_image,
                    passport_issue_date: passport_issue_date,
                    passport_expiry_date: passport_expiry_date,
                    passport_issue_place: passport_issue_place,
                    facebook_id: facebook_id,
                    linkedin_id: linkedin_id,
                    line_id: line_id,
                    whatsapp_id: whatsapp_id,
                    _token: '{{csrf_token()}}'
                },
                success:function(data, textStatus, xhr){
                    if(xhr.status == 200) {
                        id = data;
                        $('.success').text(textStatus);
                    } else {
                        console.log(textStatus);
                    }
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert(errorThrown);
                    return false;
                 }
            });
        };
        if(className.search('visaNarrivalInfo') > 0){

        };
    });

    function formatDate(date) {
        var d = new Date(date),
            month = '' + (d.getMonth() + 1),
            day = '' + d.getDate(),
            year = d.getFullYear();

        if (month.length < 2)
            month = '0' + month;
        if (day.length < 2)
            day = '0' + day;

        return [year, month, day].join('-');
    }

    // $('.basicInfo').validate({
    //     console.log('here');
    //     submitHandler: function(form) {
    //         $.ajax({
    //             url: form.action,
    //             type: form.method,
    //             data: $(form).serialize(),
    //             success: function(response) {
    //                 $('#answers').html(response);
    //             }
    //         });
    //     }
    // });

    // $(document).ready(function() {
        // $('.nationality', '.martial_status').select2();

    // });

    function validation_check(item, index){
        if( document.getElementById(item) == "" ) {
            return false;
         }
    }

    $('input[name="passport_image"]').change(function(e){
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
</script>
@endsection
