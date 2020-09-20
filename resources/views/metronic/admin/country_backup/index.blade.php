@extends('layouts.admin')
@section('content')
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Country <small>List</small></h1>
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
            <a href="{{ url('admin/country') }}">Country</a>
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
        <h3 class="panel-title">{{__('Countries')}}
            <a href="{{route('country_create')}}" title="New Country" class="panel-title-btn btn btn-icon waves-effect waves-light btn-success m-b-5 pull-right"> <i class="ion-plus-circled"></i> </a>
        </h3>
      </div>
      <div class="panel-body row">
        <div class="table-responsive">
          <table class="table table-hover table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>{{__('Name')}}</th>
              <th>{{__('Bangla Name')}}</th>
              <th>{{__('Code')}}</th>
              <th>{{__('Status')}}</th>
              <th>{{__('Action')}}</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $number = ($countryList->currentPage() * $countryList->perPage() ) - ($countryList->perPage() - 1 );
            ?>
            @foreach($countryList as $key=>$item)
              <tr>
                <td>{{ $number++ }}</td>
                <td>{{$item['title']}}</td>
                <td>{{$item['title_bn']}}</td>
                <td>{{$item['code']}}</td>
                <td>{{$item['active_status']=='Active'?'Active':'In-Active'}}</td>
                <td>
                  <a href="{{route('country_edit',$item['id'])}}" title="Edit" class="action-btn btn btn-icon waves-effect waves-light btn-default m-b-1 "><i class="md md-edit"></i></a>
                  <a href="{{route('country_destroy',$item['id'])}}" title="Remove" class="action-btn btn btn-icon waves-effect waves-light btn-default m-b-1 "><i class="md md-cancel"></i></a>
                  
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        <div class="text-center">
          {{ $countryList->appends(request()->except('page'))->links() }}
        </div>
      </div><!-- panel-body -->
    </div> <!-- panel -->
  </div> <!-- col-->
</div>
@endsection
@section('scripts')
@endsection
