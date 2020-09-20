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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Userinfo List</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/userinfo') }}" class="text-muted">Userinfo</a>
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
            <a href="{{route('userinfo.create')}}" class="btn btn-light font-weight-bold btn-sm">Add New</a>
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
                    
                    <h3 class="card-label">Userinfo List</h3>
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
                                    Full Name
                                </th>
                                <th>
                                    Username
                                </th>
                                <th>
                                    Mobile No
                                </th>
                                <th>
                                    Email
                                </th>
                                <th>
                                    Usertype
                                </th>
                                <th>
                                    Image
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
                    @foreach($userList as $user)
                            <tr>
                            <td>{{ ++$sl }}</td>
                                <td>{{ $user['full_name'] }}</td>
                                <td>{{ $user['username'] }}</td>
                                <td>{{ $user['contact_no'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <td>{{ isset($user['userGroup']['name']) ? $user['userGroup']['name'] : '' }}</td>
                                <td>
                                    <img alt="" class="img-circle" src="{{asset($user->image)}}"  />
                                </td>
                                <td>
                                    <span class="label label-sm label-{{ $user['status'] == 1 ? 'success' : 'danger' }} ">
                                    {{ $user['status'] == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{route('userinfo.edit',$user['id'])}}" class="btn btn-icon-only purple" title="Edit">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    
                                    <a href="#" class="btn btn-icon-only red">
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
