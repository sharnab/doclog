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
    <div class="container" style="background-color: #EEF0F8;">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-custom example example-compact">
                    <div class="wizard wizard-1" id="kt_wizard_v1" data-wizard-state="step-first" data-wizard-clickable="false">
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
                                        <i class="wizard-icon flaticon-profile-1"></i>
                                        <h3 class="wizard-title">2. Employment Information</h3>
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
                                        <i class="wizard-icon flaticon-paper-plane"></i>
                                        <h3 class="wizard-title">3. Visa & Arrival Info</h3>
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
                    </div>
                    <!--begin::Card-->
                    <div class="card card-custom example example-compact" style="background-color: #EEF0F8;">
                        {{-- <div class="card-header">
                            <h3 class="card-title">New Recruiting Agency</h3>
                            <div class="card-toolbar">
                                <div class="example-tools justify-content-center">
                                <a href="{{ url('admin/agency') }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                    </div>
                </div>
            </div> --}}
            <!--begin::Form-->
            <form class="form-horizontal" role="form" method="POST" action="{{ route('agency_store') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                {{-- <div class="card-body pb-5" data-wizard-type="step-content" data-wizard-state="current"> --}}
                <!--begin::Entry-->
                <div class="d-flex flex-column-fluid">

                    <!--begin::Container-->
                    <div class="container" style="background-color: #EEF0F8; padding: 0">
                        <div class="row">
                            <div class="col-lg-12 pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                <!--begin::Form-->
                                <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
                                    <div class="card-header">
                                        <h3 class="card-title">Passport Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Passport Number:</label>
                                                <input name="passport_no" type="text" class="form-control form-control-solid" placeholder="Enter passport number" />
                                                <span class="form-text text-muted">Please enter your passport number</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Issue Date:</label>
                                                <input name="issue_date" type="date" class="form-control form-control-solid input-group date" placeholder="Enter issue date" data-date-format="dd/mm/yyyy" />
                                                <span class="form-text text-muted">Please enter your passport's issue date</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Expiry Date:</label>
                                                <input name="expiry_date" type="date" class="form-control form-control-solid input-group date_1" placeholder="Enter issue date" data-date-format="dd/mm/yyyy" />
                                                <span class="form-text text-muted">Please enter your passport's expiry date</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Issue Place:</label>
                                                <input name="issue_place" type="text" class="form-control form-control-solid" placeholder="Enter issue place" />
                                                <span class="form-text text-muted">Please enter your passport issued place</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
                                    <div class="card-header">
                                        <h3 class="card-title">Basic Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>First Name:</label>
                                                <input name="first_name" type="text" class="form-control form-control-solid" placeholder="Enter first name" />
                                                <span class="form-text text-muted">Please enter your first name</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Last Name:</label>
                                                <input name="last_name" type="text" class="form-control form-control-solid" placeholder="Enter last name" />
                                                <span class="form-text text-muted">Please enter your last name</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Father's Name:</label>
                                                <input name="father_name" type="text" class="form-control form-control-solid" placeholder="Enter father's name" />
                                                <span class="form-text text-muted">Please enter your father's name</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Mother's Name:</label>
                                                <input name="mother_name" type="text" class="form-control form-control-solid" placeholder="Enter mother's name" />
                                                <span class="form-text text-muted">Please enter your mother's name</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Maritial Status:</label>
                                                <select class="form-control martial_status" id="kt_select2_2" name="maritial_status_id" required>
                                                    <option value="1">bachelor</option>
                                                    <option value="2">Married</option>
                                                    <option value="3">Divorsed</option>
                                                </select>
                                                <span class="form-text text-muted">Please enter your martial status</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Spouse's Name:</label>
                                                <input name="spouse_name" type="text" class="form-control form-control-solid" placeholder="Enter spouse's name" />
                                                <span class="form-text text-muted">Please enter your spouse's name</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Nationality:</label>
                                                <select class="form-control nationality" id="kt_select2_1" name="country_id" required>
                                                    <option value="1">
                                                        Bangladesh
                                                    </option>
                                                </select>
                                                <span class="form-text text-muted">Please enter your nationality</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>National ID:</label>
                                                <input name="national_id" type="text" class="form-control form-control-solid" placeholder="Enter national id number" />
                                                <span class="form-text text-muted">Please enter your national id number</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Date of Birth:</label>
                                                <input name="date_of_birth" type="date" class="form-control form-control-solid input-group date" placeholder="Enter date of birth" data-date-format="dd/mm/yyyy" />
                                                <span class="form-text text-muted">Please enter your date of birth</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Birth Place:</label>
                                                <input name="birth_place" type="text" class="form-control form-control-solid" placeholder="Enter place of birth" />
                                                <span class="form-text text-muted">Please enter your place of birth</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Gender:</label>
                                                <input name="spouse_name" type="text" class="form-control form-control-solid" placeholder="Enter spouse's name" />
                                                <span class="form-text text-muted">Please enter your spouse's name</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Religion:</label>
                                                <select class="form-control religion" id="kt_select2_3" name="religion_id" required>
                                                    <option value="1">
                                                        Islam
                                                    </option>
                                                </select>
                                                <span class="form-text text-muted">Please enter your religion</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Email:</label>
                                                <input name="email" type="email" class="form-control form-control-solid" placeholder="Enter full name" />
                                                <span class="form-text text-muted">We'll never share your email with anyone else</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Contact Number:</label>
                                                <input name="contact_no" type="text" class="form-control form-control-solid" placeholder="Enter contact number" />
                                                <span class="form-text text-muted">Please enter your contact number</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0 0 0">
                                    <div class="card-header">
                                        <h3 class="card-title">Social Network Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Line ID:</label>
                                                <input name="line_id" type="text" class="form-control form-control-solid" placeholder="Enter Line ID" />
                                                <span class="form-text text-muted">Please enter your line account id</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Facebook ID:</label>
                                                <input name="facebook_id" type="text" class="form-control form-control-solid" placeholder="Enter facebook id" />
                                                <span class="form-text text-muted">Please enter your facebook account id</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Whatsapp ID:</label>
                                                <input name="whatsapp_id" type="text" class="form-control form-control-solid" placeholder="Enter Whatsapp ID" />
                                                <span class="form-text text-muted">Please enter your whatsapp account id</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Linkedin ID:</label>
                                                <input name="linkedin_id" type="text" class="form-control form-control-solid" placeholder="Enter Linkedin id" />
                                                <span class="form-text text-muted">Please enter your linkedin account id</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12 pb-5" data-wizard-type="step-content">
                                <!--begin::Form-->
                                <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
                                    <div class="card-header">
                                        <h3 class="card-title">Passport Details</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Passport Number:</label>
                                                <input name="passport_no" type="text" class="form-control form-control-solid" placeholder="Enter passport number" />
                                                <span class="form-text text-muted">Please enter your passport number</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Issue Date:</label>
                                                <input name="issue_date" type="date" class="form-control form-control-solid input-group date" placeholder="Enter issue date" data-date-format="dd/mm/yyyy" />
                                                <span class="form-text text-muted">Please enter your passport's issue date</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Expiry Date:</label>
                                                <input name="expiry_date" type="date" class="form-control form-control-solid input-group date_1" placeholder="Enter issue date" data-date-format="dd/mm/yyyy" />
                                                <span class="form-text text-muted">Please enter your passport's expiry date</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Issue Place:</label>
                                                <input name="issue_place" type="text" class="form-control form-control-solid" placeholder="Enter issue place" />
                                                <span class="form-text text-muted">Please enter your passport issued place</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0">
                                    <div class="card-header">
                                        <h3 class="card-title">Basic Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>First Name:</label>
                                                <input name="first_name" type="text" class="form-control form-control-solid" placeholder="Enter first name" />
                                                <span class="form-text text-muted">Please enter your first name</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Last Name:</label>
                                                <input name="last_name" type="text" class="form-control form-control-solid" placeholder="Enter last name" />
                                                <span class="form-text text-muted">Please enter your last name</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Father's Name:</label>
                                                <input name="father_name" type="text" class="form-control form-control-solid" placeholder="Enter father's name" />
                                                <span class="form-text text-muted">Please enter your father's name</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Mother's Name:</label>
                                                <input name="mother_name" type="text" class="form-control form-control-solid" placeholder="Enter mother's name" />
                                                <span class="form-text text-muted">Please enter your mother's name</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Maritial Status:</label>
                                                <select class="form-control martial_status" id="kt_select2_2" name="maritial_status_id" required>
                                                    <option value="1">bachelor</option>
                                                    <option value="2">Married</option>
                                                    <option value="3">Divorsed</option>
                                                </select>
                                                <span class="form-text text-muted">Please enter your martial status</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Spouse's Name:</label>
                                                <input name="spouse_name" type="text" class="form-control form-control-solid" placeholder="Enter spouse's name" />
                                                <span class="form-text text-muted">Please enter your spouse's name</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Nationality:</label>
                                                <select class="form-control nationality" id="kt_select2_1" name="country_id" required>
                                                    <option value="1">
                                                        Bangladesh
                                                    </option>
                                                </select>
                                                <span class="form-text text-muted">Please enter your nationality</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>National ID:</label>
                                                <input name="national_id" type="text" class="form-control form-control-solid" placeholder="Enter national id number" />
                                                <span class="form-text text-muted">Please enter your national id number</span>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Date of Birth:</label>
                                                <input name="date_of_birth" type="date" class="form-control form-control-solid input-group date" placeholder="Enter date of birth" data-date-format="dd/mm/yyyy" />
                                                <span class="form-text text-muted">Please enter your date of birth</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Birth Place:</label>
                                                <input name="birth_place" type="text" class="form-control form-control-solid" placeholder="Enter place of birth" />
                                                <span class="form-text text-muted">Please enter your place of birth</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Gender:</label>
                                                <input name="spouse_name" type="text" class="form-control form-control-solid" placeholder="Enter spouse's name" />
                                                <span class="form-text text-muted">Please enter your spouse's name</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Religion:</label>
                                                <select class="form-control religion" id="kt_select2_3" name="religion_id" required>
                                                    <option value="1">
                                                        Islam
                                                    </option>
                                                </select>
                                                <span class="form-text text-muted">Please enter your religion</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Email:</label>
                                                <input name="email" type="email" class="form-control form-control-solid" placeholder="Enter full name" />
                                                <span class="form-text text-muted">We'll never share your email with anyone else</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Contact Number:</label>
                                                <input name="contact_no" type="text" class="form-control form-control-solid" placeholder="Enter contact number" />
                                                <span class="form-text text-muted">Please enter your contact number</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card card-custom gutter-b example example-compact" style="margin: 25px 0 0 0">
                                    <div class="card-header">
                                        <h3 class="card-title">Social Network Information</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Line ID:</label>
                                                <input name="line_id" type="text" class="form-control form-control-solid" placeholder="Enter Line ID" />
                                                <span class="form-text text-muted">Please enter your line account id</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Facebook ID:</label>
                                                <input name="facebook_id" type="text" class="form-control form-control-solid" placeholder="Enter facebook id" />
                                                <span class="form-text text-muted">Please enter your facebook account id</span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-6">
                                                <label>Whatsapp ID:</label>
                                                <input name="whatsapp_id" type="text" class="form-control form-control-solid" placeholder="Enter Whatsapp ID" />
                                                <span class="form-text text-muted">Please enter your whatsapp account id</span>
                                            </div>
                                            <div class="col-lg-6">
                                                <label>Linkedin ID:</label>
                                                <input name="linkedin_id" type="text" class="form-control form-control-solid" placeholder="Enter Linkedin id" />
                                                <span class="form-text text-muted">Please enter your linkedin account id</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Wizard Actions-->
                <div class="d-flex justify-content-between border-top mt-5 pt-10" style="padding: 1rem !important; margin-top: 0 !important; background: white">
                    <div class="mr-2">
                        <button class="btn btn-light-primary font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-prev">Previous</button>
                    </div>
                    <div>
                        <button class="btn btn-success font-weight-bold text-uppercase px-9 py-4" data-wizard-type="action-next">Submit & Next</button>
                    </div>
                </div>
                <!--end::Wizard Actions-->
            </form>
        </div>
    </div>
</div>
</div>
</div>
</div>
<!--end::Card-->
<!--begin::Card-->

@endsection
@section('scripts')
<script src="{{ asset('assets/js/pages/custom/wizard/wizard-1.js')}}"></script>
<script src="{{ asset('assets/plugins/global/plugins.bundle.js')}}"></script>
<script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
<script src="{{ asset('assets/js/scripts.bundle.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('.nationality', '.martial_status').select2();
    });
</script>
@endsection
