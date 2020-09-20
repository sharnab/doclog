@extends('layouts.admin')
@section('content')
<!--begin::Subheader-->
<!--begin::Subheader-->
<div class="subheader py-2 py-lg-4 subheader-solid" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline mr-5">
                <!--begin::Page Title-->
                <h5 class="text-dark font-weight-bold my-2 mr-5">Splash Screen List</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/splashscreen') }}" class="text-muted">Splash Screen</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#" class="text-muted">List</a>
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
            <a href="{{route('splashscreen_create')}}" class="btn btn-light font-weight-bold btn-sm">Add New</a>
            <!--end::Actions-->
            <!--begin::Dropdown-->

            <!--end::Dropdown-->
        </div>
        <!--end::Toolbar-->
    </div>
</div>
<!--end::Subheader-->
<!--begin::Entry-->
<div class="d-flex flex-column-fluid">
    <!--begin::Container-->
    <div class="container">
        <!--begin::Notice-->

        <!--end::Notice-->
        <!--begin::Card-->
        <div class="card card-custom">
            <div class="card-header">
                <div class="card-title">
                    
                    <h3 class="card-label">Splash Screen List</h3>
                </div>

            </div>
            <div class="card-body">
                @include('layouts.alert')
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                    <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Title English
                                </th>
                                <th>
                                    Title Bangla
                                </th>
                                <th>
                                    Description English
                                </th>
                                <th>
                                    Description Bangla
                                </th>
                                <th>
                                    Display Sequence
                                </th>
                                <th>
                                    File
                                </th>
                                <th>
                                    Status
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php $sl = 0; ?>
                    <?php $sl = 0; ?>
                            @foreach($sScreenList as $splashscreen)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $splashscreen['title'] }}</td>
                                <td>{{ $splashscreen['title_bn'] }}</td>
                                <td>{{ $splashscreen['description'] }}</td>
                                <td>{{ $splashscreen['description_bn'] }}</td>
                                <td>{{ $splashscreen['display_sequence'] }}</td>
                                <td>
                                    @if($splashscreen->file_url)
                                        <img alt="" class="img-circle" src="{{url($splashscreen->file_url)}}" height="80" />
                                    @endif
                                </td>
                                <td>
                                    <span class="label label-sm label-{{ $splashscreen['active_status'] == 'Active' ? 'success' : 'danger' }} ">
                                    {{ $splashscreen['active_status']}}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{route('splashscreen_edit',$splashscreen['id'])}}" class="btn btn-icon-only purple" title="Edit">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('splashscreen_destroy',$splashscreen['id'])}}" class="btn btn-icon-only red">
                                    <i class="fa fa-times"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<!--end::Entry-->
@endsection
