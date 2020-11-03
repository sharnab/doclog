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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Personal Information</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Personal Information</a>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('employee_data_update',$items['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
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
                                            @if($items['passport']['passport_file'])
                                                <label style="padding-left: 50%"><a href="{{$items['passport']['passport_file']}}" target="_blank">Uploaded image</a></label>
                                            @endif
                                            <div class="input-group date">
                                                <input name="passport_number" type="text" class="form-control form-control-solid" placeholder="Enter passport number" style="width: 90%" value="{{($items['passport_number'])?$items['passport_number']:''}}" />
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
                                                <input name="passport_issue_date" type="text" class="form-control form-control-solid" placeholder="Enter issue date" id="kt_datepicker_3" data-date-format="dd/mm/yyyy" value="{{(isset($items['passport_issue_date']) && !empty($items['passport_issue_date']))?date('d/m/Y', strtotime($items['passport_issue_date'])):''}}"/>
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
                                                <input name="passport_expiry_date" type="text" class="form-control form-control-solid" placeholder="Enter expiry date" id="kt_datepicker_3" value="{{isset($items['passport_expiry_date']) && !empty($items['passport_expiry_date'])?date('d/m/Y', strtotime($items['passport_expiry_date'])):''}}"/>
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your passport's expiry date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Select-->
                                        <div class="form-group">
                                            <label>Issue Place:</label>
                                            <input name="passport_issue_place" type="text" class="form-control form-control-solid" placeholder="Enter issue place" value="{{($items['passport_issue_place'])?$items['passport_issue_place']:''}}"/>
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
                                            <input name="first_name" type="text" class="form-control form-control-solid" placeholder="Enter first name" value="{{($items['first_name'])?$items['first_name']:''}}" />
                                            {{-- <span class="form-text text-muted">Please enter your first name</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Last Name:</label>
                                            <input name="last_name" type="text" class="form-control form-control-solid" placeholder="Enter last name" value="{{($items['last_name'])?$items['last_name']:''}}" />
                                            {{-- <span class="form-text text-muted">Please enter your last name</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Father's Name:</label>
                                            <input name="father_name" type="text" class="form-control form-control-solid" placeholder="Enter father's name" value="{{($items['father_name'])?$items['father_name']:''}}" />
                                            {{-- <span class="form-text text-muted">Please enter your father's name</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Mother's Name:</label>
                                            <input name="mother_name" type="text" class="form-control form-control-solid" placeholder="Enter mother's name" value="{{($items['mother_name'])?$items['mother_name']:''}}" />
                                            {{-- <span class="form-text text-muted">Please enter your mother's name</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Maritial Status:</label>
                                            <select class="form-control martial_status" id="kt_select_1" name="marital_status">
                                                <option value='Unmarried' {{($items['marital_status'] == 'Unmarried')?'selected':''}}>Unmarried</option>
                                                <option value='Married' {{($items['marital_status'] == 'Married')?'selected':''}}>Married</option>
                                                <option value='Divorsed' {{($items['marital_status'] == 'Divorsed')?'selected':''}}>Divorsed</option>
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your martial status</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Spouse's Name:</label>
                                            <input name="spouse_name" type="text" class="form-control form-control-solid" placeholder="Enter spouse's name" value="{{($items['spouse_name'])?$items['spouse_name']:''}}" />
                                            {{-- <span class="form-text text-muted">Please enter your spouse's name</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Nationality:</label>
                                            <select class="form-control nationality" id="kt_select_1" name="nationality" value="{{($items['nationality'])?$items['nationality']:''}}">

                                                <option value="Bangladeshi" {{($items['nationality'] == 'Bangladeshi')?'selected':''}}>
                                                    Bangladeshi
                                                </option>

                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your nationality</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>National ID:</label>
                                            @if($items['nid_image'])
                                                <label style="padding-left: 50%"><a href="{{$items['nid_image']}}" target="_blank">Uploaded image</a></label>
                                            @endif
                                            <div class="input-group date">
                                                <input name="nid" type="text" class="form-control form-control-solid" placeholder="Enter national id number" value="{{($items['nid'])?$items['nid']:''}}" />
                                                <label class="btn btn-default">
                                                    <span class="flaticon-upload" id="icon-style" style="font-size: 20px"> <input name="nid_image" id="nid_image" type="file" hidden></span>
                                                </label>
                                            </div>

                                            {{-- <span class="form-text text-muted">Please enter your national id number</span> --}}
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Date of Birth:</label>
                                            <div class="input-group date mb-2">
                                                <input name="date_of_birth" type="text" class="form-control form-control-solid" placeholder="Enter date of birth" id="kt_datepicker_3" value="{{(isset($items['date_of_birth']) && !empty($items['date_of_birth']))?date('d/m/Y', strtotime($items['date_of_birth'])):''}}"/>
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your date of birth</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Birth Place:</label>
                                            <select class="form-control birth_country" id="kt_select_1" name="birth_country_id">
                                                @foreach ($country as $birth_place)
                                                <option value="{{ $birth_place['id'] }} {{($items['birth_place'] == $birth_place['id'])?'selected':''}}">
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
                                            <select class="form-control gender" id="kt_select_1" name="gender">
                                                <option value='null'>Select Gender</option>
                                                @foreach ($gender as $gen)
                                                <option value="{{ $gen['id'] }}" {{($items['gender'] == $gen['title'])?'selected':''}}>
                                                    {{ $gen['title'] }}
                                                </option>
                                                @endforeach
                                            </select>
                                            {{-- <span class="form-text text-muted">Please enter your spouse's name</span> --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Religion:</label>
                                            <select class="form-control religion" id="kt_select_1" name="religion_id">
                                                <option value='null'>Select Religion</option>
                                                @foreach ($religion as $religion)
                                                <option value="{{ $religion['id'] }}" {{($items['religion_id'] == $religion['id'])?'selected':''}}>
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
                                            <input name="email" type="text" class="form-control form-control-solid" value="{{($items['email'])?$items['email']:''}}" placeholder="Enter your email" />
                                            {{-- --}}
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <input name="mobile" type="text" class="form-control form-control-solid" value="{{($items['mobile'])?$items['mobile']:''}}" placeholder="Enter contact number" />
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
                                        <input name="line_id" type="text" class="form-control form-control-solid" value="{{($items['line_id'])?$items['line_id']:''}}" placeholder="Enter Line ID" />
                                        {{-- <span class="form-text text-muted">Please enter your line account id</span> --}}
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <label>Facebook ID:</label>
                                        <input name="facebook_id" type="text" class="form-control form-control-solid" value="{{($items['facebook_id'])?$items['facebook_id']:''}}" placeholder="Enter facebook id" />
                                        {{-- <span class="form-text text-muted">Please enter your facebook account id</span> --}}
                                        <!--end::Input-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <label>Whatsapp ID:</label>
                                        <input name="whatsapp_id" type="text" class="form-control form-control-solid" value="{{($items['whatsapp_id'])?$items['whatsapp_id']:''}}" placeholder="Enter Whatsapp ID" />
                                        {{-- <span class="form-text text-muted">Please enter your whatsapp account id</span> --}}
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Select-->
                                        <label>Linkedin ID:</label>
                                        <input name="linkedin_id" type="text" class="form-control form-control-solid" value="{{($items['linkedin_id'])?$items['linkedin_id']:''}}" placeholder="Enter Linkedin id" />
                                        {{-- <span class="form-text text-muted">Please enter your linkedin account id</span> --}}
                                        <!--end::Select-->
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
