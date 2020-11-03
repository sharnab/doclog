@extends('layouts.admin')
@section('extra_css')

<style type="text/css">
    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }
    div.personal_info_tab, div.personal_info_tab>*
    {
        cursor: pointer;
    }
</style>
@endsection

@section('content')
<!--begin::Content-->
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Subheader-->
    <div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
        <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
            <!--begin::Info-->
            <div class="d-flex align-items-center flex-wrap mr-1">
                <!--begin::Mobile Toggle-->
                <button class="burger-icon burger-icon-left mr-4 d-inline-block d-lg-none" id="kt_subheader_mobile_toggle">
                    <span></span>
                </button>
                <!--end::Mobile Toggle-->
                <!--begin::Page Heading-->
                <div class="d-flex align-items-baseline mr-5">
                    <!--begin::Page Title-->
                    <h5 class="text-dark font-weight-bold my-2 mr-5">User Profile</h5>
                    <!--end::Page Title-->
                    <!--begin::Breadcrumb-->
                    <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Expatriate Information</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Profile</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="" class="text-muted">Overview</a>
                        </li>
                    </ul>
                    <!--end::Breadcrumb-->
                </div>
                <!--end::Page Heading-->
            </div>
            <!--end::Info-->
            <div class="d-flex align-items-center">
				<!--begin::Actions-->
				<a href="#" class="btn btn-primary font-weight-bold btn-sm edit_btn">
                    Edit
                </a>
				<!--end::Actions-->
			</div>
        </div>
    </div>
    <!--end::Subheader-->
    <!--begin::Entry-->
    <div class="d-flex flex-column-fluid">
        <!--begin::Container-->
        <div class="container">
            <!--begin::Profile Overview-->
            <div class="d-flex flex-row">
                <!--begin::Aside-->
                <div class="flex-row-auto offcanvas-mobile w-300px w-xl-350px" id="kt_profile_aside">
                    <!--begin::Profile Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body pt-4">
                            <!--begin::User-->
                            <div class="d-flex align-items-center">
                                <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                    <div class="symbol-label" style="background-image:url('../../{{$userInfo['image']}}')"></div>
                                    <i class="symbol-badge bg-success"></i>
                                </div>
                                <div>
                                    <a href="#" class="font-weight-bolder font-size-h5 text-dark-75 text-hover-primary">{{$userInfo['first_name'].' '.$userInfo['last_name']}}</a>
                                </div>
                            </div>
                            <!--end::User-->
                            <!--begin::Contact-->
                            <div class="py-9">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Email:</span>
                                    <a href="#" class="text-muted">{{$userInfo['email']}}</a>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <span class="font-weight-bold mr-2">Phone:</span>
                                    <span class="text-muted">{{$userInfo['mobile']}}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">Passport Number:</span>
                                    <span class="text-muted">{{$userInfo['passport_number']}}</span>
                                </div>
                                <div class="d-flex align-items-center justify-content-between">
                                    <span class="font-weight-bold mr-2">Nationality:</span>
                                    <span class="text-muted">{{$userInfo['nationality']}}</span>
                                </div>
                            </div>
                            <!--end::Contact-->
                            <!--begin::Nav-->
                            <div class="navi navi-bold navi-hover navi-active navi-link-rounded">
                                <div class="navi-item mb-2 personal_info_tab" style="cursor: pointer">
                                    <span class="navi-link py-4 active" id="personal_info_id">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Design/Layers.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <polygon points="0 0 24 0 24 24 0 24"/>
                                                        <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                        <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Personal Information</span>
                                    </span>
                                </div>
                                <div class="navi-item mb-2 visa_tab" style="cursor: pointer">
                                    <span class="navi-link py-4" id="visa_info_id">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/General/User.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M6,2 L18,2 C19.6568542,2 21,3.34314575 21,5 L21,19 C21,20.6568542 19.6568542,22 18,22 L6,22 C4.34314575,22 3,20.6568542 3,19 L3,5 C3,3.34314575 4.34314575,2 6,2 Z M12,11 C13.1045695,11 14,10.1045695 14,9 C14,7.8954305 13.1045695,7 12,7 C10.8954305,7 10,7.8954305 10,9 C10,10.1045695 10.8954305,11 12,11 Z M7.00036205,16.4995035 C6.98863236,16.6619875 7.26484009,17 7.4041679,17 C11.463736,17 14.5228466,17 16.5815,17 C16.9988413,17 17.0053266,16.6221713 16.9988413,16.5 C16.8360465,13.4332455 14.6506758,12 11.9907452,12 C9.36772908,12 7.21569918,13.5165724 7.00036205,16.4995035 Z" fill="#000000"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Visa & Arrival Information</span>
                                    </span>
                                </div>
                                <div class="navi-item mb-2 employee_tab" style="cursor: pointer">
                                    <span class="navi-link py-4" id="employee_info_id">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Code/Compiling.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M5.84026576,8 L18.1597342,8 C19.1999115,8 20.0664437,8.79732479 20.1528258,9.83390904 L20.8194924,17.833909 C20.9112219,18.9346631 20.0932459,19.901362 18.9924919,19.9930915 C18.9372479,19.9976952 18.8818364,20 18.8264009,20 L5.1735991,20 C4.0690296,20 3.1735991,19.1045695 3.1735991,18 C3.1735991,17.9445645 3.17590391,17.889153 3.18050758,17.833909 L3.84717425,9.83390904 C3.93355627,8.79732479 4.80008849,8 5.84026576,8 Z M10.5,10 C10.2238576,10 10,10.2238576 10,10.5 L10,11.5 C10,11.7761424 10.2238576,12 10.5,12 L13.5,12 C13.7761424,12 14,11.7761424 14,11.5 L14,10.5 C14,10.2238576 13.7761424,10 13.5,10 L10.5,10 Z" fill="#000000"/>
                                                        <path d="M10,8 L8,8 L8,7 C8,5.34314575 9.34314575,4 11,4 L13,4 C14.6568542,4 16,5.34314575 16,7 L16,8 L14,8 L14,7 C14,6.44771525 13.5522847,6 13,6 L11,6 C10.4477153,6 10,6.44771525 10,7 L10,8 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Employee Information</span>
                                    </span>
                                </div>
                                <div class="navi-item mb-2 finance_tab" style="cursor: pointer">
                                    <span class="navi-link py-4" id="financial_info_id">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Shield-user.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                                        <rect fill="#000000" opacity="0.3" transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) " x="3" y="3" width="18" height="7" rx="1"/>
                                                        <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z" fill="#000000"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Financial Information</span>
                                    </span>
                                </div>
                                <div class="navi-item mb-2 contacts_tab" style="cursor: pointer">
                                    <span class="navi-link py-4" id="contact_info_id">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Communication/Mail-opened.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M11.575,21.2 C6.175,21.2 2.85,17.4 2.85,12.575 C2.85,6.875 7.375,3.05 12.525,3.05 C17.45,3.05 21.125,6.075 21.125,10.85 C21.125,15.2 18.825,16.925 16.525,16.925 C15.4,16.925 14.475,16.4 14.075,15.65 C13.3,16.4 12.125,16.875 11,16.875 C8.25,16.875 6.85,14.925 6.85,12.575 C6.85,9.55 9.05,7.1 12.275,7.1 C13.2,7.1 13.95,7.35 14.525,7.775 L14.625,7.35 L17,7.35 L15.825,12.85 C15.6,13.95 15.85,14.825 16.925,14.825 C18.25,14.825 19.025,13.725 19.025,10.8 C19.025,6.9 15.95,5.075 12.5,5.075 C8.625,5.075 5.05,7.75 5.05,12.575 C5.05,16.525 7.575,19.1 11.575,19.1 C13.075,19.1 14.625,18.775 15.975,18.075 L16.8,20.1 C15.25,20.8 13.2,21.2 11.575,21.2 Z M11.4,14.525 C12.05,14.525 12.7,14.35 13.225,13.825 L14.025,10.125 C13.575,9.65 12.925,9.425 12.3,9.425 C10.65,9.425 9.45,10.7 9.45,12.375 C9.45,13.675 10.075,14.525 11.4,14.525 Z" fill="#000000"/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Contact Information</span>
                                    </span>
                                </div>
                                <div class="navi-item mb-2 documents_tab" style="cursor: pointer">
                                    <span class="navi-link py-4"  id="document_info_id">
                                        <span class="navi-icon mr-2">
                                            <span class="svg-icon">
                                                <!--begin::Svg Icon | path:assets/media/svg/icons/Layout/Layout-top-panel-6.svg-->
                                                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M12.4644661,14.5355339 L9.46446609,14.5355339 C8.91218134,14.5355339 8.46446609,14.9832492 8.46446609,15.5355339 C8.46446609,16.0878187 8.91218134,16.5355339 9.46446609,16.5355339 L12.4644661,16.5355339 L12.4644661,17.5355339 C12.4644661,18.6401034 11.5690356,19.5355339 10.4644661,19.5355339 L6.46446609,19.5355339 C5.35989659,19.5355339 4.46446609,18.6401034 4.46446609,17.5355339 L4.46446609,13.5355339 C4.46446609,12.4309644 5.35989659,11.5355339 6.46446609,11.5355339 L10.4644661,11.5355339 C11.5690356,11.5355339 12.4644661,12.4309644 12.4644661,13.5355339 L12.4644661,14.5355339 Z" fill="#000000" opacity="0.3" transform="translate(8.464466, 15.535534) rotate(-45.000000) translate(-8.464466, -15.535534) "/>
                                                        <path d="M11.5355339,9.46446609 L14.5355339,9.46446609 C15.0878187,9.46446609 15.5355339,9.01675084 15.5355339,8.46446609 C15.5355339,7.91218134 15.0878187,7.46446609 14.5355339,7.46446609 L11.5355339,7.46446609 L11.5355339,6.46446609 C11.5355339,5.35989659 12.4309644,4.46446609 13.5355339,4.46446609 L17.5355339,4.46446609 C18.6401034,4.46446609 19.5355339,5.35989659 19.5355339,6.46446609 L19.5355339,10.4644661 C19.5355339,11.5690356 18.6401034,12.4644661 17.5355339,12.4644661 L13.5355339,12.4644661 C12.4309644,12.4644661 11.5355339,11.5690356 11.5355339,10.4644661 L11.5355339,9.46446609 Z" fill="#000000" transform="translate(15.535534, 8.464466) rotate(-45.000000) translate(-15.535534, -8.464466) "/>
                                                    </g>
                                                </svg>
                                                <!--end::Svg Icon-->
                                            </span>
                                        </span>
                                        <span class="navi-text font-size-lg">Documents & Others</span>
                                    </span>
                                </div>
                            </div>
                            <!--end::Nav-->
                        </div>
                        <!--end::Body-->
                    </div>
                    <!--end::Profile Card-->
                </div>
                <!--end::Aside-->
                <!--begin::Content-->
                <div class="flex-row-fluid ml-lg-8">
                    <div class="personal_info" style="display: block">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Basic Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg father_name">{{$userInfo['father_name']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Father's Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mother_name">{{$userInfo['mother_name']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Mother's Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg marital_status">{{$userInfo['marital_status']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Maritial Status</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            @if($userInfo['marital_status' == 'married'])
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                        <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg spouse_name">{{$userInfo['spouse_name']}}</span>
                                                        <span class="text-muted font-weight-bold font-size-sm my-1">Spouse's Name</span>
                                                    </div>
                                                </div>
                                            @endif
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg nid">{{$userInfo['nid']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">National ID</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg date_of_birth">{{date('d M, Y', strtotime($userInfo['date_of_birth']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Date Of Birth</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg birth_place">{{$userInfo['birth_place']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Place Of Birth</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg gender">{{$userInfo['gender']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Gender</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg religion">{{$userInfo['title']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Religion</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            {{--<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">--}}
                                                {{--<div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">--}}
                                                    {{--<span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$userInfo['gender']}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Gender</span>--}}
                                                {{--</div>--}}
                                            {{--</div>--}}
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Passport Details</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg passport_number">{{$userInfo['passport_number']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Passport Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg passport_issue_date">{{date('d M, Y', strtotime($userInfo['passport_issue_date']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Issue Date</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg passport_expiry_date">{{date('d M, Y', strtotime($userInfo['passport_expiry_date']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Expiry Date</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg passport_issue_place">{{$userInfo['passport_issue_place']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Issue Place</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Social Network Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg line_id">{{$userInfo['line_id']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Line ID</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg facebook_id">{{$userInfo['facebook_id']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Facebook ID</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg whatsapp_id">{{$userInfo['whatsapp_id']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Whatsapp ID</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg linkedin_id">{{$userInfo['linkedin_id']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Linkedin ID</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="visa_info" style="display: none">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Arrival Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg arrival_entry_date"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Entry Date</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg arrival_country"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Arrival Country</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg arrival_iata_code"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Airport IATA Code</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg arrival_immigration_date"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Immigration Endorsement Date</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Departure Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg departure_date"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Departure Date</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg departure_country"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Departure Country</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg departure_iata_code"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Airport IATA Code</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg departure_immigration_date"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Immigration Endorsement Date</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Visa Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg visa_type"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Visa Type</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg entry_type"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Entries</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg visa_entry_type"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Issue Date</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg visa_expiry_date"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Expiry Date</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10 visa_image" style="visibility: hidden">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                        <a class="visa_file_link" target='_blank' href=""><div class="symbol-label visa_file"></div></a>
                                                    </div>
                                                    {{-- <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg visa_file"></span> --}}
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Uploaded File</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3"></div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="employee_info" style="display: none">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">BMET Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bmet_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">BMET Smart Card</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg worker_category"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Category of worker</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10 bmet_image" style="visibility: hidden">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                        <a class="bmet_file_link" target='_blank' href=""><div class="symbol-label bmet_file"></div></a>
                                                    </div>
                                                    {{-- <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg visa_file"></span> --}}
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Uploaded File</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3"></div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Ministry Approval Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg memo_number">{{$userInfo['memo_number']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Memo Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg ministry_issue_date">{{date('d M, Y', strtotime($userInfo['issue_date']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Issue Date</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10 ministry_approval_image" style="visibility: hidden">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                        <a class="ministry_approval_file_link" target='_blank' href=""><div class="symbol-label ministry_approval_file"></div></a>
                                                    </div>
                                                    {{-- <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg visa_file"></span> --}}
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Uploaded File</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3"></div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Work Permit Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg permit_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Permit Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg worker_type"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Type Of Worker</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg wp_issue_date">{{date('d M, Y', strtotime($userInfo['issue_date']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Issue Date</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg wp_expiry_date">{{date('d M, Y', strtotime($userInfo['expiry_date']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Expiry Date</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10 wp_image" style="visibility: hidden">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <div class="symbol symbol-60 symbol-xxl-100 mr-5 align-self-start align-self-xxl-center">
                                                        <a class="work_permit_file_link" target='_blank' href=""><div class="symbol-label work_permit_file"></div></a>
                                                    </div>
                                                    {{-- <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg visa_file"></span> --}}
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Uploaded File</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3"></div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Work Place Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg wp_email">{{$userInfo['email']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Email</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg wp_contact_number">{{$userInfo['contact_number']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg wp_address">{{date('d M, Y', strtotime($userInfo['address']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Address</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    {{--<span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{date('d M, Y', strtotime($userInfo['expiry_date']))}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Expiry Date</span>--}}
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Mother Company's Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mc_name">{{$userInfo['name']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mc_business_type">{{$userInfo['business_type']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Business Type</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mc_email">{{date('d M, Y', strtotime($userInfo['email']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Email</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mc_contact_no">{{date('d M, Y', strtotime($userInfo['contact_no']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg mc_address">{{date('d M, Y', strtotime($userInfo['address']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Address</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    {{--<span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{date('d M, Y', strtotime($userInfo['expiry_date']))}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>--}}
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Supplier Company Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg sc_name">{{$userInfo['name']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg sc_business_type">{{$userInfo['business_type']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Business Type</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg sc_email">{{date('d M, Y', strtotime($userInfo['email']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Email</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg sc_contact_no">{{date('d M, Y', strtotime($userInfo['contact_no']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg sc_address">{{date('d M, Y', strtotime($userInfo['address']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Address</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    {{--<span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{date('d M, Y', strtotime($userInfo['expiry_date']))}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>--}}
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Recruiting Agency Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg ra_name">{{$userInfo['name']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg ra_business_type">{{$userInfo['business_type']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Business Type</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg ra_email">{{date('d M, Y', strtotime($userInfo['email']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Email</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg ra_contact_no">{{date('d M, Y', strtotime($userInfo['contact_no']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg ra_address">{{date('d M, Y', strtotime($userInfo['address']))}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Address</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    {{--<span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{date('d M, Y', strtotime($userInfo['expiry_date']))}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>--}}
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="financial_info" style="display: none">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Salary Information</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg amount"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Salary/Wage</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg currency"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Currency</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Bank Account Information(Current Country)</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_account_name"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Account Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_account_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Account Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_bank_name"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Bank Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_branch_name"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Branch Name</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_routing_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Routing Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_swift_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Swift</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Bank Account(Bangladesh)</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_account_name"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Account Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_account_number">{{$userInfo['entry_type']}}</span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Account Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_bank_name"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Bank Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_branch_name"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Branch Name</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_routing_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Routing Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_swift_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Swift</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="contact_info" style="display: none">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Address (Current Country)</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_flat_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Flat Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_housing_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Holding/House number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_street"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Street</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    {{--<span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{date('d M, Y', strtotime($userInfo['immigration_endorsement_date']))}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Immigration Endorsement Date</span>--}}
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_area"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Area</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_post_code"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Post Code</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_city"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">City</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_coutry"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Country</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_email"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Email</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_contact_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Emergency Contact(Current Country)</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_emg_name"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_emg_relation"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Relationship</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_emg_email"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Email</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_emg_contact_no"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg cc_emg_address"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Address</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    {{--<span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$userInfo['emg_contact_no']}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>--}}
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Permanent Address(Bangladesh)</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_permanent_street"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Street/Para</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    {{--<span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$userInfo['housing_no']}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Holding/House number</span>--}}
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_permanent_division"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Division</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_permanent_district"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">District</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_permanent_thana"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Thana/Upazilla</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_permanent_word"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Word/Union</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_permanent_area"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Area/Village</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_permanent_post_office"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Post Office</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_permanent_email"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Email</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_permanent_contact_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Mailing Address(Bangladesh)</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_present_street"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Street/Para</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    {{--<span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$userInfo['housing_no']}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Holding/House number</span>--}}
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_present_division"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Division</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_present_district"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">District</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_present_thana"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Thana/Upazilla</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_present_word"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Word/Union</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_present_area"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Area/Village</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_present_post_office"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Post Office</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_present_email"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Email</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_present_contact_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Emergency Contact(Bangladesh)</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_emg_name"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Name</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_emg_relation"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Relationship</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_emg_email"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Email</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span href="#" class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_emg_contact_number"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                        <!--begin::Item-->
                                        <div class="d-flex flex-wrap align-items-center mb-10">
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg bd_emg_address"></span>
                                                    <span class="text-muted font-weight-bold font-size-sm my-1">Address</span>
                                                </div>
                                            </div>
                                            <!--end::Title-->
                                            <!--begin::Title-->
                                            <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    {{--<span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$userInfo['emg_contact_no']}}</span>--}}
                                                    {{--<span class="text-muted font-weight-bold font-size-sm my-1">Contact Number</span>--}}
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                        </div>
                                        <!--end::Item-->
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                    <div class="documents" style="display: none">
                        <!--begin::Row-->
                        <div class="row">
                            <div class="col-lg-12">
                                <!--begin::List Widget 14-->
                                <div class="card card-custom card-stretch gutter-b">
                                    <!--begin::Header-->
                                    <div class="card-header border-0">
                                        <h3 class="card-title font-weight-bolder text-dark">Other Documents</h3>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Body-->
                                    <div class="card-body pt-2">
                                        @foreach ($documents as $document)
                                            <!--begin::Item-->
                                            <div class="d-flex flex-wrap align-items-center mb-10">
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                        <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$document['document_name']}}</span>
                                                        <span class="text-muted font-weight-bold font-size-sm my-1">Name</span>
                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                                <!--begin::Title-->
                                                <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3" style="text-align: end">
                                                    <div class="d-flex flex-column flex-grow-1 my-lg-0 my-2 pr-3">
                                                        <a href="{{$document['image']}}"><button type="button" class="btn btn-primary mr-2">View Document</button></a>
                                                        {{-- <span class="text-dark-75 font-weight-bolder text-hover-primary font-size-lg">{{$userInfo['arrival_country']}}</span>
                                                        <span class="text-muted font-weight-bold font-size-sm my-1">Arrival Country</span> --}}
                                                    </div>
                                                </div>
                                                <!--end::Title-->
                                            </div>
                                            <!--end::Item-->
                                        @endforeach
                                    </div>
                                    <!--end::Body-->
                                </div>
                                <!--end::List Widget 14-->
                            </div>
                        </div>
                        <!--end::Row-->
                    </div>
                </div>
                <!--end::Content-->
            </div>
            <!--end::Profile Overview-->
        </div>
        <!--end::Container-->
    </div>
    <!--end::Entry-->
</div>
<!--end::Content-->

@endsection
@section('scripts')

<script type="text/javascript">

    $('.personal_info_tab').on('click', function() {
        $('.personal_info').css('display', 'block');
        $('.visa_info').css('display', 'none');
        $('.employee_info').css('display', 'none');
        $('.financial_info').css('display', 'none');
        $('.contact_info').css('display', 'none');
        $('.documents').css('display', 'none');

        $("#personal_info_id").attr('class', 'navi-link py-4 active');
        $("#visa_info_id").attr('class', 'navi-link py-4');
        $("#employee_info_id").attr('class', 'navi-link py-4');
        $("#financial_info_id").attr('class', 'navi-link py-4');
        $("#contact_info_id").attr('class', 'navi-link py-4');
        $("#document_info_id").attr('class', 'navi-link py-4');

        ajaxDataLoad('get_expat_personal_data');
    });
    $('.visa_tab').on('click', function() {
        $('.personal_info').css('display', 'none');
        $('.visa_info').css('display', 'block');
        $('.employee_info').css('display', 'none');
        $('.financial_info').css('display', 'none');
        $('.contact_info').css('display', 'none');
        $('.documents').css('display', 'none');

        $("#personal_info_id").attr('class', 'navi-link py-4');
        $("#visa_info_id").attr('class', 'navi-link py-4 active');
        $("#employee_info_id").attr('class', 'navi-link py-4');
        $("#financial_info_id").attr('class', 'navi-link py-4');
        $("#contact_info_id").attr('class', 'navi-link py-4');
        $("#document_info_id").attr('class', 'navi-link py-4');

        ajaxDataLoad('get_expat_visa_data');
    });
    $('.employee_tab').on('click', function() {
        $('.personal_info').css('display', 'none');
        $('.visa_info').css('display', 'none');
        $('.employee_info').css('display', 'block');
        $('.financial_info').css('display', 'none');
        $('.contact_info').css('display', 'none');
        $('.documents').css('display', 'none');

        $("#personal_info_id").attr('class', 'navi-link py-4');
        $("#visa_info_id").attr('class', 'navi-link py-4');
        $("#employee_info_id").attr('class', 'navi-link py-4 active');
        $("#financial_info_id").attr('class', 'navi-link py-4');
        $("#contact_info_id").attr('class', 'navi-link py-4');
        $("#document_info_id").attr('class', 'navi-link py-4');

        ajaxDataLoad('get_expat_employee_data');
    });
    $('.finance_tab').on('click', function() {
        $('.personal_info').css('display', 'none');
        $('.visa_info').css('display', 'none');
        $('.employee_info').css('display', 'none');
        $('.financial_info').css('display', 'block');
        $('.contact_info').css('display', 'none');
        $('.documents').css('display', 'none');

        $("#personal_info_id").attr('class', 'navi-link py-4');
        $("#visa_info_id").attr('class', 'navi-link py-4');
        $("#employee_info_id").attr('class', 'navi-link py-4');
        $("#financial_info_id").attr('class', 'navi-link py-4 active');
        $("#contact_info_id").attr('class', 'navi-link py-4');
        $("#document_info_id").attr('class', 'navi-link py-4');

        ajaxDataLoad('get_expat_financial_data');
    });
    $('.contacts_tab').on('click', function() {
        $('.personal_info').css('display', 'none');
        $('.visa_info').css('display', 'none');
        $('.employee_info').css('display', 'none');
        $('.financial_info').css('display', 'none');
        $('.contact_info').css('display', 'block');
        $('.documents').css('display', 'none');

        $("#personal_info_id").attr('class', 'navi-link py-4');
        $("#visa_info_id").attr('class', 'navi-link py-4');
        $("#employee_info_id").attr('class', 'navi-link py-4');
        $("#financial_info_id").attr('class', 'navi-link py-4');
        $("#contact_info_id").attr('class', 'navi-link py-4 active');
        $("#document_info_id").attr('class', 'navi-link py-4');

        ajaxDataLoad('get_contact_info_data');
    });
    $('.documents_tab').on('click', function() {
        $('.personal_info').css('display', 'none');
        $('.visa_info').css('display', 'none');
        $('.employee_info').css('display', 'none');
        $('.financial_info').css('display', 'none');
        $('.contact_info').css('display', 'none');
        $('.documents').css('display', 'block');

        $("#personal_info_id").attr('class', 'navi-link py-4');
        $("#visa_info_id").attr('class', 'navi-link py-4');
        $("#employee_info_id").attr('class', 'navi-link py-4');
        $("#financial_info_id").attr('class', 'navi-link py-4');
        $("#contact_info_id").attr('class', 'navi-link py-4');
        $("#document_info_id").attr('class', 'navi-link py-4 active');

        ajaxDataLoad('get_expat_document_data');
    });

    window.onload = function() {
        ajaxDataLoad('get_expat_personal_data');
    };

    function ajaxDataLoad(name){
        var l = window.location;
        var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
        jQuery.ajax({
            type: "GET",
            url: base_url + '/public/expat/' + name,
            dataType: "JSON",
            success: function(data) {
                var months=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
                if(name === 'get_expat_personal_data'){

                    // basic info
                    dob = new Date(data.date_of_birth);
                    jQuery('.father_name').text(data.father_name);
                    jQuery('.mother_name').text(data.mother_name);
                    jQuery('.marital_status').text(data.marital_status);
                    jQuery('.spouse_name').text(data.spouse_name);
                    jQuery('.nid').text(data.nid);
                    jQuery('.date_of_birth').text(dob.getDate()+" "+months[dob.getMonth()]+", "+dob.getFullYear());
                    jQuery('.place_of_birth').text(data.birth_place);
                    jQuery('.gender').text(data.gender);
                    jQuery('.religion').text(data.religion.title);

                    // passport info
                    passport_issue_date = new Date(data.passport.issue_date);
                    passport_expiry_date = new Date(data.passport.expiry_date);
                    console.log(data.passport);
                    jQuery('.passport_number').text(data.passport.passport_number);
                    jQuery('.passport_issue_place').text(data.passport.issue_place);
                    jQuery('.passport_issue_date').text(passport_issue_date.getDate()+" "+months[passport_issue_date.getMonth()]+", "+passport_issue_date.getFullYear());
                    jQuery('.passport_expiry_date').text(passport_expiry_date.getDate()+" "+months[passport_expiry_date.getMonth()]+", "+passport_expiry_date.getFullYear());

                    // social media info
                    jQuery('.line_id').text(data.line_id);
                    jQuery('.linkedin_id').text(data.linkedin_id);
                    jQuery('.facebook_id').text(data.facebook_id);
                    jQuery('.whatsapp_id').text(data.whatsapp_id);

                    jQuery('.edit_btn').attr("href", '{{route('personal_data_edit',$userInfo['id'])}}');
                }

                if(name === 'get_expat_visa_data'){
                    // arrival info
                    arrival_immigration_date = new Date(data.arrival.immigration_endorsement_date);
                    arrival_date = new Date(data.arrival.date);
                    jQuery('.arrival_entry_date').text(arrival_date.getDate()+" "+months[arrival_date.getMonth()]+", "+arrival_date.getFullYear());
                    jQuery('.arrival_country').text(data.arrival.title);
                    jQuery('.arrival_iata_code').text(data.arrival.iata_code);
                    jQuery('.arrival_immigration_date').text(arrival_immigration_date.getDate()+" "+months[arrival_immigration_date.getMonth()]+", "+arrival_immigration_date.getFullYear());

                    // departure info
                    if(data.departure){
                        departure_immigration_date = new Date(data.departure.immigration_endorsement_date);
                        departure_date = new Date(data.departure.date);
                        // jQuery('.departure_immigration_date').text(departure_immigration_date.getDate()+" "+months[departure_immigration_date.getMonth()]+", "+departure_immigration_date.getFullYear());

                        jQuery('.departure_date').text(departure_date.getDate()+" "+months[departure_date.getMonth()]+", "+departure_date.getFullYear());
                        jQuery('.departure_country').text(data.departure.title);
                        jQuery('.departure_iata_code').text(data.departure.iata_code);
                    }
                    // visa info
                    expiry_date = new Date(data.visa_info.expiry_date);
                    jQuery('.visa_type').text(data.visa_info.visa_type);
                    jQuery('.entry_type').text(data.visa_info.entry_type);
                    jQuery('.visa_entry_type').text(data.visa_info.visa_type);
                    jQuery('.visa_expiry_date').text(expiry_date.getDate()+" "+months[expiry_date.getMonth()]+", "+expiry_date.getFullYear());

                    if(data.visa_info.image){
                        jQuery('.visa_image').css('visibility', 'visible');
                        var str = data.visa_info.image;
                        var res = str.split(".");

                        if(res[res.length - 1] == 'jpg'||'jpeg'||'gif'||'png'||'JPG'||'JPEG'||'GIF'||'PNG'){
                            jQuery('.visa_file').css("background-image", 'url(../../' + data.visa_info.image + ')' );
                        }
                        else{
                            jQuery('.visa_file').css("background-image", 'url(../../uploads/noimage.png)' );
                        }
                        jQuery('.visa_file_link').attr("href", '../../' + data.visa_info.image);
                    }

                    jQuery('.edit_btn').attr("href", '{{route('visa_data_edit',$userInfo['id'])}}');
                }
                if(name === 'get_expat_employee_data'){
                    // basic info
                    ministry_issue_date = new Date(data.ministry_approval_info.issue_date);

                    // bmet info
                    jQuery('.bmet_number').text(data.bmet_info.bmet_number);
                    jQuery('.worker_category').text(data.employee_info.worker_category_id);
                    jQuery('.memo_number').text(data.ministry_approval_info.memo_number);
                    jQuery('.ministry_issue_date').text(ministry_issue_date.getDate()+" "+months[ministry_issue_date.getMonth()]+", "+ministry_issue_date.getFullYear());

                    if(data.bmet_info.image){
                        jQuery('.bmet_image').css('visibility', 'visible');
                        var str = data.bmet_info.image;
                        var res = str.split(".");

                        if(res[res.length - 1] == 'jpg'||'jpeg'||'gif'||'png'||'JPG'||'JPEG'||'GIF'||'PNG'){
                            jQuery('.bmet_file').css("background-image", 'url(../../' + data.bmet_info.image + ')' );
                        }
                        else{
                            jQuery('.bmet_file').css("background-image", 'url(../../uploads/noimage.png)' );
                        }
                        jQuery('.bmet_file_link').attr("href", '../../' + data.bmet_info.image);
                    }

                    if(data.ministry_approval_info.image){
                        jQuery('.ministry_approval_file').css('visibility', 'visible');
                        var str = data.ministry_approval_info.image;
                        var res = str.split(".");

                        if(res[res.length - 1] == 'jpg'||'jpeg'||'gif'||'png'||'JPG'||'JPEG'||'GIF'||'PNG'){
                            jQuery('.ministry_approval_file').css("background-image", 'url(../../' + data.ministry_approval_info.image + ')' );
                        }
                        else{
                            jQuery('.ministry_approval_file').css("background-image", 'url(../../uploads/noimage.png)' );
                        }
                        jQuery('.ministry_approval_file_link').attr("href", '../../' + data.ministry_approval_info.image);
                    }

                    if(data.work_permit_info.image){
                        jQuery('.wp_image').css('visibility', 'visible');
                        var str = data.work_permit_info.image;
                        var res = str.split(".");

                        if(res[res.length - 1] == 'jpg'||'jpeg'||'gif'||'png'||'JPG'||'JPEG'||'GIF'||'PNG'){
                            jQuery('.work_permit_file').css("background-image", 'url(../../' + data.work_permit_info.image + ')' );
                        }
                        else{
                            jQuery('.work_permit_file').css("background-image", 'url(../../uploads/noimage.png)' );
                        }
                        jQuery('.work_permit_file_link').attr("href", '../../' + data.work_permit_info.image);
                    }

                    // work permit info
                    wp_issue_date = new Date(data.work_permit_info.issue_date);
                    wp_expiry_date = new Date(data.work_permit_info.expiry_date);
                    jQuery('.wp_issue_date').text(wp_issue_date.getDate()+" "+months[wp_issue_date.getMonth()]+", "+wp_issue_date.getFullYear());
                    jQuery('.wp_expiry_date').text(wp_expiry_date.getDate()+" "+months[wp_expiry_date.getMonth()]+", "+wp_expiry_date.getFullYear());
                    jQuery('.permit_number').text(data.work_permit_info.permit_number);
                    jQuery('.worker_type').text(data.employee_info.worker_type_id);

                    // work place info
                    jQuery('.wp_email').text(data.work_place_info.email);
                    jQuery('.wp_contact_number').text(data.work_place_info.mobile);
                    jQuery('.wp_address').text(data.work_place_info.address);

                    // mother company info
                    jQuery('.mc_name').text(data.mother_company_info.name);
                    jQuery('.mc_business_type').text(data.mother_company_info.business_type);
                    jQuery('.mc_email').text(data.mother_company_info.email);
                    jQuery('.mc_contact_no').text(data.mother_company_info.mobile);
                    jQuery('.mc_address').text(data.mother_company_info.address);

                    // supploer company info
                    jQuery('.sc_name').text(data.supplier_company_info.name);
                    jQuery('.sc_business_type').text(data.supplier_company_info.business_type);
                    jQuery('.sc_email').text(data.supplier_company_info.email);
                    jQuery('.sc_contact_no').text(data.supplier_company_info.mobile);
                    jQuery('.sc_address').text(data.supplier_company_info.address);

                    // rental company info
                    jQuery('.ra_name').text(data.recruiting_agency_info.name);
                    jQuery('.ra_business_type').text(data.recruiting_agency_info.rl_number);
                    jQuery('.ra_email').text(data.recruiting_agency_info.email);
                    jQuery('.ra_contact_no').text(data.recruiting_agency_info.mobile);
                    jQuery('.ra_address').text(data.recruiting_agency_info.address);

                    jQuery('.edit_btn').attr("href", '{{route('employee_data_edit',$userInfo['id'])}}');
                }
                if(name === 'get_expat_financial_data'){
                    // basic info
                    dob = new Date(data.date_of_birth);
                    jQuery('.amount').text(data.salary_info.amount);
                    jQuery('.currency').text(data.salary_info.currency_id);

                    //current country bank info
                    jQuery('.cc_account_name').text(data.current_bank_info.account_name);
                    jQuery('.cc_account_number').text(data.current_bank_info.account_number);
                    jQuery('.cc_bank_name').text(data.current_bank_info.bank_name);
                    jQuery('.cc_branch_name').text(data.current_bank_info.branch_name);
                    jQuery('.cc_routing_number').text(data.current_bank_info.routing_number);
                    jQuery('.cc_swift_number').text(data.current_bank_info.swift);

                    // bd bank info
                    jQuery('.bd_account_name').text(data.bd_bank_info.account_name);
                    jQuery('.bd_account_number').text(data.bd_bank_info.account_number);
                    jQuery('.bd_bank_name').text(data.bd_bank_info.bank_name);
                    jQuery('.bd_branch_name').text(data.bd_bank_info.branch_name);
                    jQuery('.bd_routing_number').text(data.bd_bank_info.routing_number);
                    jQuery('.bd_swift_number').text(data.bd_bank_info.swift);

                    jQuery('.edit_btn').attr("href", '{{route('financial_data_edit',$userInfo['id'])}}');
                }
                if(name === 'get_contact_info_data'){
                    // Current country address info
                    dob = new Date(data.date_of_birth);
                    jQuery('.cc_flat_number').text(data.current_address_info.flat_number);
                    jQuery('.cc_housing_number').text(data.current_address_info.housing_number);
                    jQuery('.cc_street').text(data.current_address_info.street);
                    jQuery('.cc_area').text(data.current_address_info.area);
                    jQuery('.cc_post_code').text(data.current_address_info.post_code);
                    jQuery('.cc_city').text(data.current_address_info.city);
                    jQuery('.cc_coutry').text(data.current_address_info.coutry);
                    jQuery('.cc_email').text(data.current_address_info.email);
                    jQuery('.cc_contact_number').text(data.current_address_info.mobile);

                    // current country emergency person info
                    jQuery('.cc_emg_name').text(data.current_emg_contact_info.name);
                    jQuery('.cc_emg_relation').text(data.current_emg_contact_info.relation);
                    jQuery('.cc_emg_email').text(data.current_emg_contact_info.email);
                    jQuery('.cc_emg_contact_no').text(data.current_emg_contact_info.mobile);
                    jQuery('.cc_emg_address').text(data.current_emg_contact_info.address);

                    // bd permanent address info
                    jQuery('.bd_permanent_street').text(data.permanent_address_info.street);
                    jQuery('.bd_permanent_division').text(data.permanent_address_info.division);
                    jQuery('.bd_permanent_district').text(data.permanent_address_info.district);
                    jQuery('.bd_permanent_thana').text(data.permanent_address_info.upazila);
                    jQuery('.bd_permanent_word').text(data.permanent_address_info.union);
                    jQuery('.bd_permanent_area').text(data.permanent_address_info.area);
                    jQuery('.bd_permanent_post_office').text(data.permanent_address_info.post_office);
                    jQuery('.bd_permanent_email').text(data.permanent_address_info.email);
                    jQuery('.bd_permanent_contact_number').text(data.permanent_address_info.mobile);

                    // bd mailing address info
                    jQuery('.bd_present_street').text(data.mail_address_info.street);
                    jQuery('.bd_present_division').text(data.mail_address_info.division);
                    jQuery('.bd_present_district').text(data.mail_address_info.district);
                    jQuery('.bd_present_thana').text(data.mail_address_info.upazila);
                    jQuery('.bd_present_word').text(data.mail_address_info.union);
                    jQuery('.bd_present_area').text(data.mail_address_info.area);
                    jQuery('.bd_present_post_office').text(data.mail_address_info.post_office);
                    jQuery('.bd_present_email').text(data.mail_address_info.email);
                    jQuery('.bd_present_contact_number').text(data.mail_address_info.mobile);

                    // bd emergency person info
                    jQuery('.bd_emg_name').text(data.bd_emg_contact_info.name);
                    jQuery('.bd_emg_relation').text(data.bd_emg_contact_info.relation);
                    jQuery('.bd_emg_email').text(data.bd_emg_contact_info.email);
                    jQuery('.bd_emg_contact_number').text(data.bd_emg_contact_info.mobile);
                    jQuery('.bd_emg_address').text(data.bd_emg_contact_info.address);

                    jQuery('.edit_btn').attr("href", '{{route('contact_data_edit',$userInfo['id'])}}');
                }
                if(name === 'get_expat_document_data'){
                    jQuery('.edit_btn').attr("href", '{{route('document_data_edit',$userInfo['id'])}}');
                }

            }
        });
    }
</script>
@endsection
