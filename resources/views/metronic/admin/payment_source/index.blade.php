@extends('layouts.admin')
@section('content')
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>{{__($module_title)}} <small>List</small></h1>
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
            <a href="{{ url('admin/'.$module_route) }}">{{__($module_title)}}</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">List</a>
        </li>
    </ul>
<div class="row">
  <div class="col-md-12">
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">{{__($module_title)}}
            <a href="{{route($module_route.'.create')}}" title="New Currency" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success m-b-5 pull-right"> <i class="ion-plus-circled"></i> </a>
        </h3>
      </div>
      <div class="panel-body row">
        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>{{__('Name')}}</th>
              <th>{{__('Payment_type')}}</th>
              <th>{{__('Charged Percentage')}}</th>
              <th>{{__('Remarks')}}</th>
              <th>{{__('Status')}}</th>
              <th class="text-right">{{__('Action')}}</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $number = ($items->currentPage() * $items->perPage() ) - ($items->perPage() - 1 );
            ?>
            @foreach($items as $key=>$item)
              <tr>
                <td>{{ $number++ }}</td>
                <td>{{$item['name']}}</td>
                <td>{{$item['paymentType']['name']}}</td>
                <td>{{$item['charged_percentage']}}</td>
                <td>{{$item['remarks']}}</td>
                <td>{{$item['active_status']==1?'Active':'In-Active'}}</td>
                <td>
                  <a href="{{route($module_route.'.edit',$item['id'])}}" title="Edit" class="action-btn btn btn-icon waves-effect waves-light btn-default m-b-1 pull-right"><i class="md md-edit"></i></a>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="text-center">
          {{ $items->appends(request()->except('page'))->links() }}
        </div>
      </div><!-- panel-body -->
    </div> <!-- panel -->
  </div> <!-- col-->
</div>
@endsection
@section('scripts')
@endsection
