@extends('layouts.admin')
<link href="/assets/global/plugins/bootstrap-datetimepicker/css/datetimepicker.css" rel="stylesheet">
<link href="/assets/global/plugins/bootstrap-timepicker/css/timepicker.css" rel="stylesheet">
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    {{_('New Customer Consignment')}}
                    <a href="{{route('customer_consignment')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning m-b-5 pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </h3>
            </div>
            <div class="panel-body">
                {!! Form::open(['route' => 'customer_consignment_store']) !!}
                @include('admin.customer_consignment.form',['submit'=>__('Save')])
                {{ Form::close() }}
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
</div>
@endsection
