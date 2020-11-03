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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Visa & Arrival Information</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">Visa & Arrival Information</a>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('visa_data_update',$items['id']) }}" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {{method_field('PUT')}}
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
                                                <input name="arrival_date" type="text" class="form-control form-control-solid" placeholder="Enter arrival date" id="kt_datepicker_3" value="{{isset($items['arrival']['date'])?((!empty($items['arrival']['date']) && !is_null($items['arrival']['date']))?date('d-m-Y',strtotime($items['arrival']['date'])):''):''}}"/>
                                            </div>
                                            {{-- <span class="form-text text-muted">Please enter your arrival date</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Arrival Country:</label>
                                            <select class="form-control arrival_country" id="kt_select_5" name="arrival_country_id" value="">
                                                <option value='null'>Select Country</option>

                                                @foreach ($countries as $country)
                                                <option value="{{ $country['id'] }}" {{($items['arrival']['arrival_country_id'] == $country['id'])?'selected':''}}>
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
                                            <input name="arrival_iata_code" type="text" class="form-control form-control-solid" value="{{isset($items['arrival']['iata_code'])?$items['arrival']['iata_code']:''}}" placeholder="Enter airport iata code" />
                                            {{-- <span class="form-text text-muted">Please enter airport iata code</span> --}}
                                        </div>
                                        <!--end::Input-->
                                    </div>
                                    <div class="col-xl-6">
                                        <!--begin::Select-->
                                        <div class="form-group">
                                            <label>Immigration Endorsement Date:</label>
                                            @if(isset($items['arrival']['immigration_endorsement_file'])&&!empty($items['arrival']['immigration_endorsement_file']))
                                                <label style="padding-left: 20%"><a href="{{$items['arrival']['immigration_endorsement_file']}}" target="_blank">Uploaded image</a></label>
                                            @endif
                                            <div class="input-group date mb-2" style="width: 98%">
                                                <input name="immigration_endorsement_date" type="text" class="form-control form-control-solid" placeholder="Enter immigration endorsement date" id="kt_datepicker_3" value="{{isset($items['arrival']['immigration_endorsement_date'])?((!empty($items['arrival']['immigration_endorsement_date']) && !is_null($items['arrival']['immigration_endorsement_date']))?date('d-m-Y',strtotime($items['arrival']['immigration_endorsement_date'])):''):''}}"/>
                                                <label class="btn btn-default">
                                                    <span class="flaticon-upload" style="font-size: 20px"> <input name="immigration_endorsement_file" id="immigration_endorsement_file" type="file" hidden></span>
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
                                            @if($items['visa']['image'])
                                                <label style="padding-left: 50%"><a href="{{$items['visa']['image']}}" target="_blank">Uploaded image</a></label>
                                            @endif
                                            <div class="input-group date mb-2" style="width: 98%">
                                                <input name="visa_type" type="text" class="form-control form-control-solid" value="{{isset($items['visa']['visa_type'])?$items['visa']['visa_type']:''}}" placeholder="Enter visa type" />
                                                <label class="btn btn-default">
                                                    <span class="flaticon-upload" style="font-size: 20px"> <input name="visa_file" id="visa_type_file" type="file" hidden></span>
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
                                                <input name="entry_type" type="text" class="form-control form-control-solid" value="{{isset($items['visa']['entry_type'])?$items['visa']['entry_type']:''}}" placeholder="Enter entries" />
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
                                                <input name="visa_issue_date" type="text" class="form-control form-control-solid" value="{{isset($items['visa']['issue_date'])?((!empty($items['visa']['issue_date']) && !is_null($items['visa']['issue_date']))?date('d-m-Y',strtotime($items['visa']['issue_date'])):''):''}}" placeholder="Enter issue date" id="kt_datepicker_3" />
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
                                            <input name="visa_expiry_date" type="text" class="form-control form-control-solid" placeholder="Enter expiry date" id="kt_datepicker_3" value="{{isset($items['visa']['expiry_date'])?((!empty($items['visa']['expiry_date']) && !is_null($items['visa']['expiry_date']))?date('d-m-Y',strtotime($items['visa']['expiry_date'])):''):''}}"/>
                                            {{-- <span class="form-text text-muted">Please enter visa expiry date</span> --}}
                                        </div>
                                        <!--end::Select-->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <!--begin::Input-->
                                        <div class="form-group">
                                            <label>Issue Date:</label>
                                            <div class="input-group date mb-2">
                                                <input name="visa_issue_date" type="text" class="form-control form-control-solid" value="{{isset($items['visa']['issue_date'])?((!empty($items['visa']['issue_date']) && !is_null($items['visa']['issue_date']))?date('d-m-Y',strtotime($items['visa']['issue_date'])):''):''}}" placeholder="Enter issue date" id="kt_datepicker_3" />
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
                                            <input name="visa_expiry_date" type="text" class="form-control form-control-solid" placeholder="Enter expiry date" id="kt_datepicker_3" value="{{isset($items['visa']['expiry_date'])?((!empty($items['visa']['expiry_date']) && !is_null($items['visa']['expiry_date']))?date('d-m-Y',strtotime($items['visa']['expiry_date'])):''):''}}"/>
                                            {{-- <span class="form-text text-muted">Please enter visa expiry date</span> --}}
                                        </div>
                                        <!--end::Select-->
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
