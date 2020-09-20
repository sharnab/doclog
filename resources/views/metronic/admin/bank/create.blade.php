@extends('layouts.admin')
@section('content')
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Bank <small>List</small></h1>
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
            <a href="{{ url('admin/bank') }}">Bank</a>
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
                <h3 class="panel-title">
                    {{_('New Bank')}}
                    <a href="{{route('bank')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning m-b-5 pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['route' => 'bank_store']) !!}
                @include('admin.bank.form',['submit'=>__('Save')])
                {{ Form::close() }}
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
</div>
@endsection
