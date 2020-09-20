@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE HEAD -->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Menu <small>List</small></h1>
    </div>
    <!-- END PAGE TITLE -->
<!-- END PAGE HEAD -->
</div>
<!-- END PAGE HEAD -->
<!-- BEGIN PAGE BREADCRUMB -->
<ul class="page-breadcrumb breadcrumb">
    <li>
        <a href="{{ url('/') }}">Dashboard</a>
        <i class="fa fa-circle"></i>
    </li>
    <li>
        <a href="{{ url('admin/permissions/menu') }}">Menu</a>
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
                    {{__('Menu Management')}}
                </div>
                <a href="{{route('menu.create')}}" title="New Menu" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success btn-back pull-right"> <i class="ion-plus-circled"></i> </a>
            </div>
            <div class="portlet-body">
                <div class="table-responsive">
                    <table class="table table-hover table-striped">
                        <thead>
                        <tr>
                          <th>#</th>
                          <th>{{__('Title')}}</th>
                          <th>{{__('Parent')}}</th>
                          <th>{{__('Alternative Title')}}</th>
                          <th>{{__('Url')}}</th>
                          <th>{{__('Icon')}}</th>
                          <th>{{__('Description')}}</th>
                          <th>{{__('Order')}}</th>
                          <th>{{__('Status')}}</th>
                          <th class="text-right">{{__('Action')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $number = ($menu->currentPage() * $menu->perPage() ) - ($menu->perPage() - 1 );
                        ?>
                        @foreach($menu as $key=>$item)
                          <tr>
                            <td>{{ $number++ }}</td>
                            <td>{{$item['title']}}</td>
                            <td>{{$item['parent']['title']}}</td>
                            <td>{{$item['alt_title']}}</td>
                            <td>{{$item['url']}}</td>
                            <td><i class="{{$item['icon']}}"></i></td>
                            <td>{!! readMoreString($item['description']) !!}</td>
                            <td>{{$item['order']}}</td>
                            <td>{{$item['status']==1?'Active':'In-Active'}}</td>
                            <td>
                              <a href="{{route('menu.edit',$item['id'])}}" title="Edit" class="action-btn btn btn-icon waves-effect waves-light btn-default m-b-1 pull-right"><i class="md md-edit"></i></a>
                            </td>
                          </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="text-center">
                  {{ $menu->appends(request()->except('page'))->links() }}
                </div>
            </div><!-- End portlet-body -->
        </div> <!-- End portlet -->
    </div> <!-- col-->
</div>
@endsection
@section('scripts')
@endsection