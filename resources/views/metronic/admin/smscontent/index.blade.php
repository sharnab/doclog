@extends('layouts.admin')
@section('extra_css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@endsection
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>SMS Content <small>List</small></h1>
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
            <a href="{{ url('admin/bank') }}">SMS Content</a>
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
                        SMS Content List
                    </div>
                    <a href="{{route('sms_content_create')}}" title="New SMS Content" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right" > <i class="ion-plus-circled"></i> </a>
                </div>
                <div class="portlet-body">
                    <div class="">
                        @include('layouts.alert')
                        <table class="table table-striped table-hover"  id="sms_content">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Title
                                </th>
                                <th>
                                    Content
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
                            @foreach($smsContentList as $smsContent)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $smsContent['title'] }}</td>
                                <td>{{ $smsContent['content'] }}</td>
                                <td>
                                    <span class="label label-sm label-{{ $smsContent['active_status'] == 1 ? 'success' : 'danger' }} ">
                                    {{ $smsContent['active_status'] == 1 ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{route('sms_content_edit',$smsContent['id'])}}" class="btn btn-icon-only purple" title="Edit">
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
        jQuery('#sms_content').DataTable();
    });
</script>

@endsection
