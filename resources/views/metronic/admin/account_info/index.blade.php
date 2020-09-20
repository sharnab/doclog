@extends('layouts.admin')
@section('extra_css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@endsection
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Account Information <small>List</small></h1>
        </div>
        <!-- END PAGE TITLE -->

    <!-- END PAGE HEAD -->
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>
            <a href="{{ url('/') }}">Home</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="{{ url('admin/account_info') }}">Account Information</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">List</a>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        Account Information List
                    </div>
                    <a href="{{route('account_info_create')}}" title="New Account Information" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right" > <i class="ion-plus-circled"></i> </a>
                </div>
                <div class="portlet-body">
                    <div class="">
                        @include('layouts.alert')
                        <table class="table table-striped table-hover"  id="account_info">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Account Name
                                </th>
                                <th>
                                    Account Number
                                </th>
                                <th>
                                    Bank
                                </th>
                                <th>
                                    Brach
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
                            @foreach($accountInfoList as $account_info)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $account_info['account_name'] }}</td>
                                <td>{{ $account_info['account_no'] }}</td>
                                <td>{{ $account_info['bank']['name'] }}</td>
                                <td>{{ $account_info['branch']['name'] }}</td>
                                <td>
                                    <span class="label label-sm label-{{ $account_info['active_status'] == 1 ? 'success' : 'danger' }} ">
                                    {{ $account_info['active_status'] == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{route('account_info_edit',$account_info['id'])}}" class="btn btn-icon-only purple" title="Edit">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<script type="text/javascript" src="{{ url('template/metronic') }}/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="{{ url('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>

<script type="text/javascript">
    jQuery(document).ready(function () {
        jQuery('#account_info').DataTable();
    });
</script>

@endsection
