@extends('layouts.admin')
@section('extra_css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@endsection
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Visa Info <small>List</small></h1>
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
            <a href="{{ url('admin/visa_info') }}">Visa Info</a>
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
                        Visa Info List
                    </div>
                    <a href="{{route('visa_info_create')}}" title="New Visa Info" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right" > <i class="ion-plus-circled"></i> </a>
                </div>
                <div class="portlet-body">
                    <div class="">
                        @include('layouts.alert')
                        <table class="table table-striped table-hover"  id="visa_info">
                        <thead>
                            <tr>
                                <th>
                                    #
                                </th>
                                <th>
                                    Passenger's Name
                                </th>
                                <th>
                                    Visa Number
                                </th>
                                <th>
                                    Country
                                </th>
                                <th>
                                    Visa Type
                                </th>
                                <th>
                                    Issue Date
                                </th>
                                <th>
                                    Expiry Date
                                </th>
                                <th>
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $sl = 0; ?>
                            @foreach($visaInfoList as $visa_info)
                            <tr>
                                <td>{{ ++$sl }}</td>
                                <td>{{ $visa_info['passenger']['given_name'] }}</td>
                                <td>{{ $visa_info['visa_number'] }}</td>
                                <td>{{ $visa_info['country']['name'] }}</td>
                                <td>{{ $visa_info['visa_type'] }}</td>
                                <td>{{ date('d M, Y', strtotime($visa_info['issue_date'])) }}</td>
                                <td>{{ date('d M, Y', strtotime($visa_info['expiry_date'])) }}</td>
                                <td>
                                    <a href="{{route('visa_info_edit',$visa_info['id'])}}" class="btn btn-icon-only purple" title="Edit">
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
        jQuery('#visa_processing').DataTable();
    });
</script>

@endsection
