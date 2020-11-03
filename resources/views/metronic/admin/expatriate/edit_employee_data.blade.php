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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Employee Information</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Employee Information</a>
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
                                            @if($items['bmet']['image'])
                                                <label style="padding-left: 50%"><a href="{{$items['bmet']['image']}}" target="_blank">Uploaded image</a></label>
                                            @endif
                                            <div class="input-group date">
                                                <input name="bmet_number" type="text" class="form-control form-control-solid" placeholder="Enter BMET Smart Card Number" value="{{isset($items['bmet']['bmet_number'])?$items['bmet']['bmet_number']:''}}" />
                                                <label class="btn btn-default">
                                                    <span class="flaticon-upload" id="icon-style" style="font-size: 20px"> <input name="bmet_file" id="bmet_file" type="file" hidden></span>
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
                                            @if($items['ministry_approval']['image'])
                                                <label style="padding-left: 50%"><a href="{{$items['ministry_approval']['image']}}" target="_blank">Uploaded image</a></label>
                                            @endif
                                            <div class="input-group date mb-2" style="width: 98%">
                                                <input name="memo_number" type="text" class="form-control form-control-solid" placeholder="Enter Memo Number" value="{{isset($items['ministry_approval']['memo_number'])?$items['ministry_approval']['memo_number']:''}}" />
                                                <label class="btn btn-default">
                                                    <span class="flaticon-upload" style="font-size: 20px"> <input name="ministry_approval_file" id="ministry_approval_file" type="file" hidden></span>
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
                                            <input name="ministry_approval_issue_date" type="text" class="form-control form-control-solid" placeholder="Enter issue date" id="kt_datepicker_3" value="{{isset($items['ministry_approval']['issue_date'])?((!empty($items['ministry_approval']['issue_date']) && !is_null($items['ministry_approval']['issue_date']))?date('d-m-Y',strtotime($items['ministry_approval']['issue_date'])):''):''}}"/>
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
                                            <label>Permit Number:</label>
                                            @if($items['work_permit']['image'])
                                                <label style="padding-left: 50%"><a href="{{$items['work_permit']['image']}}" target="_blank">Uploaded image</a></label>
                                            @endif
                                            <div class="input-group date mb-2" style="width: 98%">
                                                <input name="work_permit_number" type="text" class="form-control form-control-solid" placeholder="Enter your work permit number" value="{{isset($items['work_permit']['permit_number'])?$items['work_permit']['permit_number']:''}}" />
                                                <label class="btn btn-default">
                                                    <span class="flaticon-upload" style="font-size: 20px"> <input name="work_permit_file" id="work_permit_file" type="file" hidden></span>
                                                </label>
                                            {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                            </div>
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Type Of Worker:</label>
                                            <div class="input-group date mb-2">
                                                <input name="worker_type_id" type="text" class="form-control form-control-solid" placeholder="Enter type of worker" value="{{isset($items['employment_type']['worker_type_id'])?$items['employment_type']['worker_type_id']:''}}" />
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
                                                <input name="work_permit_issue_date" type="text" class="form-control form-control-solid" placeholder="Enter your work permit issue date" id="kt_datepicker_3" value="{{(isset($items['work_permit']['issue_date'])?((!empty($items['work_permit']['issue_date']) && !is_null($items['work_permit']['issue_date']))?date('d-m-Y',strtotime($items['work_permit']['issue_date'])):''):'')}}"/>
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter visa issue date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Expiry Date:</label>
                                            <div class="input-group date mb-2">
                                                <input name="work_permit_expiry_date" type="text" class="form-control form-control-solid" placeholder="Enter your work permit expiry date" id="kt_datepicker_3" value="{{(isset($items['work_permit']['expiry_date'])?((!empty($items['work_permit']['expiry_date']) && !is_null($items['work_permit']['expiry_date']))?date('d-m-Y',strtotime($items['work_permit']['expiry_date'])):''):'')}}"/>
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
                                <h3 class="card-title">Work Place Information</h3>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Email:</label>
                                            <input name="work_place_email" type="text" class="form-control form-control-solid" placeholder="Enter your work place email" value="{{isset($items['work_place']['email'])?$items['work_place']['email']:''}}" />
                                        </div>
                                    </div>
                                        <!--end::Input-->
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="work_place_mobile" type="text" class="form-control form-control-solid" placeholder="Enter your work place contact number" value="{{isset($items['work_place']['mobile'])?$items['work_place']['mobile']:''}}" />
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
                                                <input name="work_place_address" type="text" class="form-control form-control-solid" placeholder="Enter your work place address" value="{{isset($items['work_place']['address'])?$items['work_place']['address']:''}}" />
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
                                            <input name="mother_company_name" class="form-control form-control-solid" placeholder="Enter your mother company's name" value="{{isset($items['mother_company']['name'])?$items['mother_company']['name']:''}}" />
                                            {{-- {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Business Type:</label>
                                            <div class="input-group date mb-2">
                                                <input name="mother_company_business_type" type="text" class="form-control form-control-solid" placeholder="Enter your mother company's business type" value="{{isset($items['mother_company']['business_type'])?$items['mother_company']['business_type']:''}}" />
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
                                            <input name="mother_company_email" type="text" class="form-control form-control-solid" placeholder="Enter your mother company's email" value="{{isset($items['mother_company']['email'])?$items['mother_company']['email']:''}}" />
                                            {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="mother_company_mobile" type="text" class="form-control form-control-solid" placeholder="Enter your mother company's contact number" value="{{isset($items['mother_company']['mobile'])?$items['mother_company']['mobile']:''}}" />
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
                                                <input name="mother_company_address" type="text" class="form-control form-control-solid" placeholder="Enter your mother company's address" value="{{isset($items['mother_company']['address'])?$items['mother_company']['address']:''}}" />
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
                                            <input name="supplier_company_name" class="form-control form-control-solid" placeholder="Enter your supplier company's name" value="{{isset($items['supplier_company']['name'])?$items['supplier_company']['name']:''}}" />
                                            {{-- {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Business Type:</label>
                                            <div class="input-group date mb-2">
                                                <input name="supplier_company_business_type" type="text" class="form-control form-control-solid" placeholder="Enter your supplier company's business type" value="{{isset($items['supplier_company']['business_type'])?$items['supplier_company']['business_type']:''}}" />
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
                                            <input name="supplier_company_email" type="text" class="form-control form-control-solid" placeholder="Enter your supplier company's email" value="{{isset($items['supplier_company']['email'])?$items['supplier_company']['email']:''}}" />
                                            {{-- {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="supplier_company_mobile" type="text" class="form-control form-control-solid" placeholder="Enter your supplier company's contact number" value="{{isset($items['supplier_company']['mobile'])?$items['supplier_company']['mobile']:''}}" />
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
                                                <input name="supplier_company_address" type="text" class="form-control form-control-solid" placeholder="Enter your supplier company's address" value="{{isset($items['supplier_company']['address'])?$items['supplier_company']['address']:''}}" />
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
                                            <input name="recruiting_agency_name" class="form-control form-control-solid" placeholder="Enter your recruiting agency's name" value="{{isset($items['recruiting_agency']['name'])?$items['recruiting_agency']['name']:''}}" />
                                            {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Business Type:</label>
                                            <div class="input-group date mb-2">
                                                <input name="recruiting_agency_rl_number" type="text" class="form-control form-control-solid" placeholder="Enter your recruiting agency's business type" value="{{isset($items['recruiting_agency']['rl_number'])?$items['recruiting_agency']['rl_number']:''}}" />
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
                                            <input name="recruiting_agency_email" type="text" class="form-control form-control-solid" placeholder="Enter your recruiting agency's email" value="{{isset($items['recruiting_agency']['email'])?$items['recruiting_agency']['email']:''}}" />
                                            {{-- {{-- <span class="form-text text-muted">We'll never share your email with anyone else</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Contact Number:</label>
                                            <div class="input-group date mb-2">
                                                <input name="recruiting_agency_mobile" type="text" class="form-control form-control-solid" placeholder="Enter your recruiting agency's contact number" value="{{isset($items['recruiting_agency']['mobile'])?$items['recruiting_agency']['mobile']:''}}" />
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
                                                <input name="recruiting_agency_address" type="text" class="form-control form-control-solid" placeholder="Enter your recruiting agency's address" value="{{isset($items['recruiting_agency']['address'])?$items['recruiting_agency']['address']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter visa issue date</span> --}}
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
