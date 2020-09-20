@extends('layouts.admin')
@section('content')
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>{{__($module_title)}} <small>Edit</small></h1>
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
            <a href="{{route($module_route.'.edit',$item['id'])}}">{{__('Edit')}}</a>
        </li>
    </ul>
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    {{_('Update '.$module_title)}}
                    <a href="{{route($module_route.'.index')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning m-b-5 pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </h3>
            </div>
            <div class="panel-body row">
                {!! Form::model($item,['url' => route($module_route.'.update',$item['id'])]) !!}
                {{ csrf_field() }}
                {{method_field('PUT')}}
                @include($module_view_path.'.form',['submit'=>__('Save')])
                {{ Form::close() }}
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
</div>
@endsection
@section('scripts')
@endsection
