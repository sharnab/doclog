@extends('layouts.admin')
@section('extra_css')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/extensions/Scroller/css/dataTables.scroller.min.css"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/extensions/ColReorder/css/dataTables.colReorder.min.css"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/select2/select2.css"/>
<link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/datepicker.css') }}" rel="stylesheet">
<link href="{{ asset('assets/global/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet">
<link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs2.css') }}" rel="stylesheet">
<link href="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker-bs3.css') }}" rel="stylesheet">
@endsection
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Due Report <small></small></h1>
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
            <a href="#">Report</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Due Report</a>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div  class="caption">
                        Due Report
                    </div>
                    <div class="btn-group pull-right">
                        <button class="btn" style="margin-top: 3px">
                            <a href="{{route('due_report_excel')}}">Export to Excel </a>
                        </button>
                    </div>

                    <!-- <a href="#" title="New Asset" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right"> <i class="ion-plus-circled"></i> </a> -->
                </div>
                <div class="portlet-body">
                    <div id="filter">
                        <div class="col-md-12 " style="padding-bottom: 20px">
                            <div class="row justify-content-md-center">
                                <form class="form-inline" role="form" >
                                    <meta name="csrf-token" content="{{ csrf_token() }}" />
                                    <div class="form-group col-md-4">
                                        <label for="package" class="control-label">{{__('Customer')}}</label>
                                        <select class="form-control " name="report_type" id="report_type" >
                                            <option value="0" >{{ __('All') }} </option>
                                            @foreach($allCustomers as $key=> $customer)
                                                <option value="{{$key}}" >{{ $customer }} </option>
                                            @endforeach
                                        </select>

                                        @if ($errors->has('report_type'))
                                            <span class="help-block has-error">
                                        <strong>{{ $errors->first('report_type') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                    <div class="col-md-4">
                                        <div class="input-daterange input-group" >
                                            <span class="input-group-addon control-label">{{__('From')}}</span>
                                            <input autocomplete="off" type="text" class="form-control" name="from_date" id="from_date" value="{{date('Y-m-d',strtotime('-30 day'))}}" required />
                                            <span class="input-group-addon control-label">{{__('To')}}</span>
                                            <input autocomplete="off" type="text" class="form-control" name="to_date" id="to_date" value="{{date('Y-m-d')}}" required/>
                                        </div>
                                    </div>
                                    <div class="col-md-2 ">
                                        <button title="Submit" type="submit"  class="btn btn-default waves-effect waves-light m-l-10"><i class="md md-fast-forward text-info"></i></button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <div class="">
                        @include('layouts.alert')
                        <table class="table table-striped table-hover"  id="assetinfo">
                        <thead>
                            <tr>
                                <th>
                                   Invoice
                                </th>
                                 <th>
                                   Customer Name
                                </th>
                                <th>
                                    Customer Contact
                                </th>
                                <th>
                                    Due Amount
                                </th>
                                <th>
                                    Billing Address
                                </th>
                            </tr>
                        </thead>
                        <tbody>

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
<script type="text/javascript" src="{{ url('template/metronic') }}/assets/global/plugins/datatables/extensions/TableTools/js/dataTables.tableTools.min.js"></script>
<script type="text/javascript" src="{{ url('template/metronic') }}/assets/global/plugins/datatables/extensions/ColReorder/js/dataTables.colReorder.min.js"></script>
<script type="text/javascript" src="{{ url('template/metronic') }}/assets/global/plugins/datatables/extensions/Scroller/js/dataTables.scroller.min.js"></script>
<script type="text/javascript" src="{{ url('template/metronic') }}/assets/global/plugins/select2/select2.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

<script type="text/javascript">
    // jQuery(document).ready(function () {
    //     jQuery('#assetinfo').DataTable();
    // });
    //
    $('.input-daterange').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){
        $('.datepicker').hide();
    });

    //Default data laoding
    jQuery(document).ready(function () {

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var is_first_load=true;
        var report_type =$('#report_type option:selected').val();;
        var from_date = $('#from_date').val();
        var to_date = $('#to_date').val();

        loadDatatable(report_type, from_date, to_date);
    });


    $(function () {
        $('form').on('submit', function (e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            var report_type = $('#report_type option:selected').val();
            var from_date = $('#from_date').val();
            var to_date = $('#to_date').val();

            jQuery('#assetinfo').DataTable().destroy();
            loadDatatable(report_type,from_date,to_date);
            console.log($('form').serialize());
        });

    });

    function loadDatatable(customer_id,from_date,to_date)
    {
        jQuery('#assetinfo').DataTable({
            // 'processing': true,
            // 'serverSide': true,
            'serverMethod': 'post',
            ajax: {
                url:"{{route('due_report_ajax')}}",
                type:'POST',
                dataType: 'json',
                "dataSrc": "",
                "data": function ( d ) {
                    return $.extend( {}, d, {
                        "customer_id": customer_id,
                        "from_date": from_date,
                        "to_date": to_date,
                    } );
                },
                results: function (data) {
                    return { results: data };
                }
            },

            // "columns": [
            //     { "data": "device_id" },
            //     { "data": "asset_short_name" },
            //     { "data": "water_time_interval" },
            //     { "data": "water_consumption" },
            //     { "data": "created_at" }
            // ]
        });
    }

</script>

@endsection
