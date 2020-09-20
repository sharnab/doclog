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
                        <a href="{{ url('admin/permissions') }}" class="text-muted">Group Permission</a>
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
                <h3 class="card-title">User Group : {{$group['name']}}</h3>
                <div class="card-toolbar">
                    <div class="example-tools justify-content-center">
                    <a href="{{ url('admin/permissions') }}"><button type="button" class='btn btn-primary mr-2'>Back</button></a>
                    </div>
                </div>
            </div>
            {!! Form::open(['action' => ['Admin\Role\PermissionsController@setPermission',$id]]) !!}
                        <div class="col-md-12">
                            {{ Form::button(__('SAVE ROLE').' <i class="md md-done-all"></i> ',['type'=>'submit','class'=>'btn btn-block btn-danger waves-effect waves-light'])}}
                        </div>
            <div class="card-body">
                @include('layouts.alert')
                <!--begin: Datatable-->
                <!-- <table class="table table-bordered table-hover table-checkable" id="kt_datatable" style="margin-top: 13px !important"> -->
                <table id="datatable" class="table table-bordered table-checkable">
                    <thead>
                        <tr>
                            <th class="no-sort">
                            <div class="checkbox">
                                <label class="checkbox" for="check-all">
                                    <input id="check-all" class="ignore" type="checkbox">
                                    <span style="margin-left: -10%;margin-top: -50%;"></span></label>
                                </div>
                            </th>
                            <th>Name</th>
                            <th>Uri</th>
                            <th>Head</th>
                            <th>Middleware</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($routes as $k=>$route)
                            <?php
                            $c = collect($user_group_permissions);
                            $checked = $c->search(function ($item,$key) use($route){
                                return (isset($route->action['as'])&&$route->action['as']==$item['as'])||
                                ($route->uri==$item['uri']&&implode(',',$route->methods)==$item['http_verbs']);
                            });
                            ?>
                            <tr>
                                <td>
                                <div class="checkbox">
                                        <label class="checkbox" for="{{$k}}">
                                        <input {{$checked!==false?'checked':''}} class="route ignore" id="{{$k}}" type="checkbox" name="routes[{{$k}}][checked]" value="1">
                                        <span style="margin-left: -10%;margin-top: -50%;"></span></label>
                                        
                                    </div>
                                    <input type="hidden" name="routes[{{$k}}][as]" value="{{isset($route->action['as'])?$route->action['as']:''}}"/>
                                    <input type="hidden" name="routes[{{$k}}][uri]" value="{{$route->uri}}"/>
                                    <input type="hidden" name="routes[{{$k}}][http_verbs]" value="{{implode(',',$route->methods)}}"/>
                                </td>
                                <td class="text-center"><?= isset($route->action['as'])?$route->action['as']:'<i class="fa fa-close"></i>'?></td>
                                <td>{{$route->uri}}</td>
                                <td>{{isset($route->methods)?implode(',',$route->methods):''}}</td>
                                <td>
                                    @if(isset($route->action['middleware']))
                                        {{is_array($route->action['middleware'])?implode(',',$route->action['middleware']):$route->action['middleware']}}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <!--end: Datatable-->
            </div>
            {{ Form::close() }}
                        {{--<ul class="list-group no-margn nicescroll todo-list" >
                            @foreach($routes as $k=>$route)
                                <li class="list-group-item">
                                    <div class="checkbox checkbox-primary">
                                        <input class="todo-done" id="{{$k}}" type="checkbox" checked="">
                                        <label for="{{$k}}">{{$route->uri}}</label>
                                    </div>
                                </li>
                            @endforeach
                        </ul>--}}
        </div>
        <!--end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->
<!--end::Entry-->
@endsection
@section('scripts')
    <link href="{{asset('template/metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.css')}}" rel="stylesheet" type="text/css"/>
    <script src="{{asset('template/metronic/assets/global/plugins/datatables/media/js/jquery.dataTables.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('template/metronic/assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/pages/crud/datatables/basic/basic.js')}}"></script>
    <script type="application/javascript">
        $(document).ready(function() {
            $('#datatable').dataTable({
                paging:false,
                "order": [],
                "columnDefs": [{
                    "targets"  : 'no-sort',
                    "orderable": false
                }]
            });
            $(document).on('submit','form',function (e) {
                $('#datatable_filter').find('input').val('');
                $('#datatable_filter').find('input').trigger('keyup');
            });
            $('#check-all').click(function(){
                $('.route').prop('checked',this.checked);
            });
        });
    </script>
    <style>
        .permission-builder .panel-body h2{
            border-bottom: 1px solid #f0f0f0;
            color: #7b7b7b;
        }
        #datatable_filter input{
            margin-top: 19px;
        }
        .ignore{
            margin-left: 0px!important;
        }
    </style>
@endsection
