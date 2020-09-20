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
                <h5 class="text-dark font-weight-bold my-2 mr-5">Permission Management</h5>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ url('/') }}" class="text-muted">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ url('admin/permissions') }}" class="text-muted">Permission</a>
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
            <a href="{{route('create_group')}}" class="btn btn-light font-weight-bold btn-sm">Add New</a>
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
                    
                    <h3 class="card-label">Permission Management</h3>
                </div>

            </div>
            <div class="card-body">
                @include('layouts.alert')
                <!--begin: Datatable-->
                <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important">
                    <thead>
                    <tr>
                    <th>#</th>
            <th>Group Name</th>
            <th>Created</th>
            <th>Updated</th>
            <th>Action</th>
                            </tr>
                    </thead>
                    <tbody>
                    <?php $sl = 0; ?>
                          @foreach($users as $user)
                            <tr>
                            <td>{{ ++$sl }}</td>
                            <td>{{$user['name']}}</td>
                <td>{{$user['created_at']}}</td>
                <td>{{$user['updated_at']}}</td>
                <td>
                  <a href="{{ route('build_permission',$user['id']) }}" class="btn btn-icon waves-effect waves-light btn-default m-b-5"> <i class="fa fa-wrench"></i> </a>
                  <a href="{{ route('permissions') }}" class="btn btn-icon waves-effect waves-light btn-default m-b-5"> <i class="fas fa-info"></i> </a>
                  {{--<div class="btn-group">
                    <button type="button" class="btn btn-info dropdown-toggle waves-effect waves-light" data-toggle="dropdown" aria-expanded="false"> set <span class="caret"></span> </button>
                    <ul class="dropdown-menu">
                      <li><a href="#">{{__('Manage Permission')}}</a></li>
                      <li><a href="#">{{__('View Permission')}}</a></li>
                    </ul>
                  </div>--}}
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
