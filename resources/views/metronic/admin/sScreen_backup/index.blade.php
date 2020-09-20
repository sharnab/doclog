@extends('layouts.admin')
@section('extra_css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
@endsection
@section('content')
    
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Splash Screen <small>List</small></h1>
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
            <a href="{{ url('admin/splashscreen') }}">Splash Screen</a>
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
                    Splash Screen List
                    </div>
                    <a href="{{route('splashscreen_create')}}" title="New Splash Screen" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right" > <i class="ion-plus-circled"></i> </a>
                </div>
                <div class="portlet-body">
                    <div class="">
                        @include('layouts.alert')
                        <table class="table table-striped table-hover"  id="splashscreen">
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
        jQuery('#splashscreen').DataTable();
    });
</script>

@endsection
