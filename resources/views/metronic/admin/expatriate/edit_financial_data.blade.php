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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Financial Information</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Financial Information</a>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('financial_data_update',$items['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
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
                                                <input name="salary_amount" type="text" class="form-control form-control-solid" placeholder="Enter salary/wage" value="{{isset($items['salary_info']['amount'])?$items['salary_info']['amount']:''}}" />
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Currency:</label>
                                            <select class="form-control martial_status" id="kt_select_1" name="salary_currency_id" value="{{isset($items['salary_info']['currency_id'])?$items['salary_info']['currency_id']:''}}">
                                                <option value="1" {{($items['salary_info']['currency_id'] == 'USD')?'selected':''}}>USD</option>
                                                <option value="2" {{($items['salary_info']['currency_id'] == 'BDT')?'selected':''}}>BDT</option>
                                            </select>
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
                                                <input name="current_country_bank_account_name" type="text" class="form-control form-control-solid" placeholder="Enter Account Name" value="{{($items['current_country_bank_account']['account_name'])?$items['current_country_bank_account']['account_name']:''}}">
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
                                                <input name="current_country_bank_account_number" type="text" class="form-control form-control-solid" placeholder="Enter Account Number" value="{{isset($items['current_country_bank_account']['account_number'])?$items['current_country_bank_account']['account_number']:''}}" />
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
                                                <input name="current_country_bank_name" type="text" class="form-control form-control-solid" placeholder="Enter Bank Name" value="{{isset($items['current_country_bank_account']['bank_name'])?$items['current_country_bank_account']['bank_name']:''}}" />
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
                                                <input name="current_country_branch_name" type="text" class="form-control form-control-solid" placeholder="Enter Branch Name" value="{{isset($items['current_country_bank_account']['branch_name'])?$items['current_country_bank_account']['branch_name']:''}}" />
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
                                                <input name="current_country_routing_number" type="text" class="form-control form-control-solid" placeholder="Enter Routing Number" value="{{isset($items['current_country_bank_account']['routing_number'])?$items['current_country_bank_account']['routing_number']:''}}" />
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
                                                <input name="current_country_swift" type="text" class="form-control form-control-solid" placeholder="Enter swift" value="{{isset($items['current_country_bank_account']['swift'])?$items['current_country_bank_account']['swift']:''}}" />
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
                                                <input name="bd_bank_account_name" type="text" class="form-control form-control-solid" placeholder="Enter Account Name" value="{{isset($items['bd_bank_account']['account_name'])?$items['bd_bank_account']['account_name']:''}}" />
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
                                                <input name="bd_bank_account_number" type="text" class="form-control form-control-solid" placeholder="Enter Account Number" value="{{isset($items['bd_bank_account']['account_number'])?$items['bd_bank_account']['account_number']:''}}" />
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
                                                <input name="bd_bank_name" type="text" class="form-control form-control-solid" placeholder="Enter Bank Name" value="{{isset($items['bd_bank_account']['bank_name'])?$items['bd_bank_account']['bank_name']:''}}" />
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
                                                <input name="bd_branch_name" type="text" class="form-control form-control-solid" placeholder="Enter Branch Name" value="{{isset($items['bd_bank_account']['branch_name'])?$items['bd_bank_account']['branch_name']:''}}" />
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
                                                <input name="bd_routing_number" type="text" class="form-control form-control-solid" placeholder="Enter Routing Number" value="{{isset($items['bd_bank_account']['routing_number'])?$items['bd_bank_account']['routing_number']:''}}" />
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
                                                <input name="bd_swift" type="text" class="form-control form-control-solid" placeholder="Enter swift" value="{{isset($items['bd_bank_account']['swift'])?$items['bd_bank_account']['swift']:''}}" />
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
