@extends('layouts.admin')
@section('content')
<!-- BEGIN PAGE HEAD -->
<div class="page-head">
    <!-- BEGIN PAGE TITLE -->
    <div class="page-title">
        <h1>Menu <small>New</small></h1>
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
        <a href="#">New</a>
    </li>
</ul>
<!-- END PAGE BREADCRUMB -->
<!-- BEGIN PAGE CONTENT-->
<div class="row">
    <div class="col-md-12">
        <div class="portlet box blue-hoki">
            <div class="portlet-title">
                <div class="caption">
                    {{_('New Menu')}}
                </div>
                <a href="{{route('menu.index')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
            </div>
            <div class="portlet-body form">
                <div class="row">
                    <div class="form-body">
                    {!! Form::open(['action' => 'Admin\Role\MenuController@store']) !!}
                    @include('admin.role.menu.form',['submit'=>__('Save'),'all_routes'=>$all_routes])
                    {{ Form::close() }}
                    </div>
                </div>
            </div><!-- portlet-body -->
        </div> <!-- portlet -->
    </div> <!-- col-->
</div>
@endsection
