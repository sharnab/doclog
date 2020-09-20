@extends('layouts.admin')
@section('extra_css')
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('template/metronic') }}/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css"/>
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
            <h1>Dashboard <small>Customer</small></h1>
        </div>
        <!-- END PAGE TITLE -->
        
    <!-- END PAGE HEAD -->
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <!-- <li>
            <a href="index.html">Home</a>
            <i class="fa fa-circle"></i>
        </li> -->
        <li>
            <a href="{{ url('customer') }}">Dashboard</a>
        </li>

    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        General Status
                    </div>
                    <!-- <div class="actions">
                        <a href="javascript:;" class="btn btn-sm btn-default easy-pie-chart-reload">
                        <i class="fa fa-repeat"></i> Reload </a>
                    </div> -->
                </div>
                <div class="portlet-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="easy-pie-chart">
                                <div class="number transactions" data-percent="{{ round($detailData['esf'],2) }}">
                                    <span>
                                    {{ round($detailData['esf'],2) }} </span>
                                    %
                                </div>
                                <span class="title" >
                                ESF <!-- <i class="icon-arrow-right"></i> -->
                                </span>
                            </div>
                        </div>
                        <div class="margin-bottom-10 visible-sm">
                        </div>
                        <div class="col-md-4">
                            <div class="easy-pie-chart">
                                <div class="number visits" data-percent="{{ round($detailData['germkit1'],2) }}">
                                    <span>
                                    {{ round($detailData['germkit1'],2) }} </span>
                                    %
                                </div>
                                <span class="title" >
                                Germkill Kit 1 <!-- <i class="icon-arrow-right"></i> -->
                                </span>
                            </div>
                        </div>
                        <div class="margin-bottom-10 visible-sm">
                        </div>
                        <div class="col-md-4">
                            <div class="easy-pie-chart">
                                <div class="number bounce" data-percent="{{ round($detailData['germkit2'],2) }}">
                                    <span>
                                    {{ round($detailData['germkit2'],2) }} </span>
                                    %
                                </div>
                                <span class="title" >
                                Germkill Kit 2 <!-- <i class="icon-arrow-right"></i> -->
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-gift"></i>Last 20 Days Water Consumption
                    </div>
                    <div class="tools">
                        <a href="javascript:;" class="collapse">
                        </a>
{{--                        <a href="#portlet-config" data-toggle="modal" class="config">--}}
{{--                        </a>--}}
{{--                        <a href="javascript:;" class="reload">--}}
{{--                        </a>--}}
{{--                        <a href="javascript:;" class="remove">--}}
{{--                        </a>--}}
                    </div>
                </div>
                <div class="portlet-body">
                    <div id="chart_2" class="chart">
                    </div>
                </div>
            </div>

        </div>

        <div class="col-md-12 col-sm-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        Device Details
                    </div>
                    
                </div>
                <div class="portlet-body">
                    <div class="row static-info">
                        <div class="col-md-4 col-sm-5 name">
                            Device :
                        </div>
                        <div class="col-md-4 col-sm-7 value">
                            {{ $detailData['asset_short_name'] }}
                        </div>
                    </div>
                    <div class="row static-info">
                        <div class="col-md-4 col-sm-5 name">
                            Device ID :
                        </div>
                        <div class="col-md-4 col-sm-7 value">
                            {{ $detailData['device_id'] }}
                        </div>
                    </div>                    
                    <div class="row static-info">
                        <div class="col-md-4 col-sm-5 name">
                            Customer Name :
                        </div>
                        <div class="col-sm-4 col-sm-7 value">
                            {{ $detailData['full_name'] }}
                        </div>
                    </div>
                    <div class="row static-info">
                        <div class="col-md-4 col-sm-5 name">
                            Customer Mobile No :
                        </div>
                        <div class="col-sm-4 col-sm-7 value">
                            {{ $detailData['mobile_no'] }}
                        </div>
                    </div>
					<div class="row static-info">
                        <div class="col-md-4 col-sm-5 name">
                           Address :
                        </div>
                        <div class="col-md-4 col-sm-7 value">
                            {{ $detailData['address'] }}
                        </div>
                    </div>
					<div class="row static-info">
                        <div class="col-md-4 col-sm-5 name">
                            Total Running Time :
                        </div>
                        <div class="col-sm-4 col-sm-7 value">
                            {{ round((($detailData['total_duration'] / 3.6) * ( 1/1000 ) * (1/1000)) , 2) }} Hours
                        </div>
                    </div>
{{--		<a class="btn btn-block btn-sm green" href="{{ route('retport_detail',$detailData['company_device_id'])}}">Report Details</a>--}}
{{--                <a class="btn btn-block btn-sm red" href="{{ route('notification_detail',$detailData['company_device_id'])}}">SOS Notification</a>--}}
                </div>
            </div>
        </div>

        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        Report
                    </div>
                    <!-- <a href="#" title="New Asset" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right"> <i class="ion-plus-circled"></i> </a> -->
                </div>
                <div class="portlet-body">
                    <div id="filter">
                        <div class="col-md-12 " style="padding-bottom: 20px">
                            <div class="row justify-content-md-center">
                            <form class="form-inline" role="form" >
                                <meta name="csrf-token" content="{{ csrf_token() }}" />
                                <input type="hidden" name="device_id" value="{{ $device_id }}" id="device_id">
                                <div class="form-group col-md-3">
                                    <label for="package" class="control-label">{{__('Report Type')}}</label>
                                    <select class="form-control " name="report_type" id="report_type" >
                                        <option value="1" >{{ __('Default') }} </option>
                                        <option value="2" >{{ __('By Day') }} </option>
                                        <option value="3" >{{ __('By Month') }} </option>
                                    </select>

                                    @if ($errors->has('report_type'))
                                        <span class="help-block has-error">
                                        <strong>{{ $errors->first('report_type') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <div class="input-daterange input-group" >
                                        <span class="input-group-addon control-label">{{__('From')}}</span>
                                        <input autocomplete="off" type="text" class="form-control" name="from_date" id="from_date" value="{{request()->input('fromDate')}}" required />
                                        <span class="input-group-addon control-label">{{__('To')}}</span>
                                        <input autocomplete="off" type="text" class="form-control" name="to_date" id="to_date" value="{{request()->input('toDate')}}" required/>
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
                                    Device ID
                                </th>
                                <th>
                                    Device
                                </th>
                                <th>
                                    Water Consumption
                                </th>
                                <th>
                                    Record Time
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/easy-pie-chart/2.1.6/jquery.easypiechart.min.js"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-daterangepicker/moment.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js')}}"></script>
<script type="text/javascript" src="{{ asset('assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}"></script>

<script type="text/javascript" src="{{ asset('assets/admin/pages/scripts/charts-flotcharts.js')}}"></script>
<script src="{{asset('assets/global/plugins/flot/jquery.flot.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/flot/jquery.flot.resize.min.js')}}"></script>
{{--<script src="{{asset('assets/global/plugins/flot/jquery.flot.pie.min.js')}}"></script>--}}
<script src="{{asset('assets/global/plugins/flot/jquery.flot.stack.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/flot/jquery.flot.crosshair.min.js')}}"></script>
<script src="{{asset('assets/global/plugins/flot/jquery.flot.categories.min.js')}}" type="text/javascript"></script>


<script type="text/javascript">
    
$('.easy-pie-chart .number.transactions').easyPieChart({
    animate: 1000,
    size: 75,
    lineWidth: 3,
    barColor: Metronic.getBrandColor('green')
});

$('.easy-pie-chart .number.visits').easyPieChart({
    animate: 1000,
    size: 75,
    lineWidth: 3,
    barColor: Metronic.getBrandColor('green')
});

$('.easy-pie-chart .number.bounce').easyPieChart({
    animate: 1000,
    size: 75,
    lineWidth: 3,
    barColor: Metronic.getBrandColor('green')
});
</script>

<script type="text/javascript">
    $('.input-daterange').datepicker({format: 'yyyy-mm-dd'}).on('changeDate', function(){
        $('.datepicker').hide();
    });

    ChartsFlotcharts.init();

       var  graph_data = '<?php echo json_encode($graph_data);?>';
       var graph_data_json = JSON.parse(graph_data);

       var xaxis = '<?php echo json_encode($xaxis);?>';
       console.log(typeof graph_data_json);

        var plot = $.plot($("#chart_2"), [{
            data: graph_data_json,
            label: "Water Consumption in mL",
            lines: {
                lineWidth: 1,
            },
            shadowSize: 0
        }], {
            series: {
                lines: {
                    show: true,
                    lineWidth: 2,
                    fill: true,
                    fillColor: {
                        colors: [{
                            opacity: 0.05
                        }, {
                            opacity: 0.01
                        }]
                    }
                },
                points: {
                    show: true,
                    radius: 3,
                    lineWidth: 1
                },
                shadowSize: 2
            },
            grid: {
                hoverable: true,
                clickable: true,
                tickColor: "#eee",
                borderColor: "#eee",
                borderWidth: 1
            },
           // colors: ["#d12610", "#37b7f3", "#52e136"],
            colors: ["#37b7f3", "#37b7f3", "#52e136"],
            xaxis: {
                ticks:JSON.parse(xaxis),
                tickDecimals: 0,
                tickColor: "#eee",
            },
            yaxis: {
                ticks: 11,
                tickDecimals: 0,
                tickColor: "#eee",
            }
        });


        function showTooltip(x, y, contents) {
            $('<div id="tooltip">' + contents + '</div>').css({
                position: 'absolute',
                display: 'none',
                top: y + 5,
                left: x + 15,
                border: '1px solid #333',
                padding: '4px',
                color: '#fff',
                'border-radius': '3px',
                'background-color': '#333',
                opacity: 0.80
            }).appendTo("body").fadeIn(200);
        }

        var previousPoint = null;
        $("#chart_2").bind("plothover", function(event, pos, item) {
            $("#x").text(pos.x.toFixed(2));
            $("#y").text(pos.y.toFixed(2));

            if (item) {
                if (previousPoint != item.dataIndex) {
                    previousPoint = item.dataIndex;

                    $("#tooltip").remove();
                    var x = item.datapoint[0].toFixed(2),
                        y = item.datapoint[1].toFixed(2);

                    showTooltip(item.pageX, item.pageY, item.series.label + " of " + x + " = " + y);
                }
            } else {
                $("#tooltip").remove();
                previousPoint = null;
            }
        });

    // ChartsFlotcharts.initPieCharts();
    // ChartsFlotcharts.initBarCharts();
     // default load


    jQuery(document).ready(function () {
        var deviceid = '<?php echo $device_id; ?>';
        console.log(deviceid);
        jQuery('#assetinfo').DataTable({
            ajax: {
                url:"{{route('report_by_id')}}",
                type:'GET',
                dataType: 'json',
                "dataSrc": "",
                "data": function ( d ) {
                    return $.extend( {}, d, {
                        "device_id": deviceid
                    } );
                },
                results: function (data) {
                    return { results: data };
                }
            },
            "columns": [
                { "data": "device_id" },
                { "data": "asset_short_name" },
                { "data": "water_consumption" },
                { "data": "created_at" }
            ]
        });
    });


    $(function () {

        $('form').on('submit', function (e) {

            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            jQuery('#assetinfo').DataTable().destroy();

            jQuery('#assetinfo').DataTable({
                ajax: {
                    url:"{{route('report_by_id')}}",
                    type:'POST',
                    dataType: 'json',
                    "dataSrc": "",
                    "data": function ( d ) {
                        return $.extend( {}, d, {
                            "device_id": $('#device_id').val(),
                            "report_type": $('#report_type option:selected').val(),
                            "from_date": $('#from_date').val(),
                            "to_date": $('#to_date').val(),
                        } );
                    },
                    results: function (data) {
                        return { results: data };
                    }
                },
                "columns": [
                    { "data": "device_id" },
                    { "data": "asset_short_name" },
                    { "data": "water_consumption" },
                    { "data": "created_at" }
                ]
            });


            console.log($('form').serialize());


        });

    });
</script>
@endsection