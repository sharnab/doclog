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
                <h5 class="text-dark font-weight-bold my-2 mr-5">App User List</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/user') }}" class="text-muted">App User</a>
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
        <!-- <div class="d-flex align-items-center">

            <a href="" class="btn btn-light font-weight-bold btn-sm">Add New</a>

        </div> -->
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
                    <h3 class="card-label">App User List</h3>
                </div>
                <div class="card-title pull-right">
                    <a href="{{route('user_create')}}" class="btn btn-success font-weight-bold btn-sm">Add New</a>
                </div>
            </div>
            <div class="card-body">
                @include('layouts.alert')
                <!--begin: Datatable-->

                <table class="table table-head-custom" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                    <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Image
                                </th>
                                <th>
                                    User
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
                                <td>@if($user['profileImage'])
                                        <img alt="" class="img-circle" style="width: 100%;max-width: 40px;height: 40px;border-radius: 10%;"src="{{'http://103.9.185.218/ami_probashi_api/files/profileimage/'.$user['profileImage']}}"/>

                                    @else
                                        <img alt="" class="img-circle" style="width: 100%;max-width: 40px;height: 40px;border-radius: 10%;"src="{{ asset('img/default-avatar.png')}}"/>
                                    @endif</td>
                                <td>{{ $user['fullName'] }}</td>
                                <td>{{ $user['userName'] }}</td>
                                <td>{{ $user['mobileNo'] }}</td>
                                <td>{{ $user['email'] }}</td>
                                <!-- <td>
                                    @if($user['profileImage'])
                                        <img alt="" class="img-circle" style="width: 100%;max-width: 40px;height: 40px;border-radius: 10%;"src="{{'http://103.9.185.218/ami_probashi_api/files/profileimage/'.$user['profileImage']}}" height="80" />
                                    @endif
                                </td> -->
                                <td>
                                    <span class="label label-sm label-{{ $user['status'] == 1 ? 'success' : 'danger' }} ">
                                    {{ $user['status'] == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>

                                    <!-- <a href="{{route('user_edit',$user['userId'])}}" class="btn btn-icon-only purple" title="Edit">
                                    <i class="fa fa-edit"></i>
                                    </a> -->
                                    <a href="{{route('user_show',$user['userId'])}}" class="btn btn-icon-only purple" title="View">
                                    <i class="fa fa-eye"></i>
                                    </a>
                                    <a href="" class="btn btn-icon-only red" title="Remove">
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
