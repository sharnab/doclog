@extends('layouts.admin')
@section('extra_css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@endsection
@section('content')
    
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>District <small>List</small></h1>
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
            <a href="{{ url('admin/district') }}">District</a>
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
                    District List
                    </div>
                    <a href="{{route('district_create')}}" title="New district" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right" > <i class="ion-plus-circled"></i> </a>
                </div>
                <div class="portlet-body">
                    <div class="">
                        @include('layouts.alert')
                        <table class="table table-striped table-hover"  id="district">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    District Name English
                                </th>
                                <th>
                                    District Name Bangla
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
                            @foreach($districtList as $district)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $district['title_en'] }}</td>
                                <td>{{ $district['title'] }}</td>
                                <td>
                                    <span class="label label-sm label-{{ $district['active_status'] == 'Active' ? 'success' : 'danger' }} ">
                                    {{ $district['active_status']}}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{route('district_edit',$district['id'])}}" class="btn btn-icon-only purple" title="Edit">
                                    <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{route('district_destroy',$district['id'])}}" class="btn btn-icon-only red">
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
        jQuery('#district').DataTable();
    });
</script>

@endsection
