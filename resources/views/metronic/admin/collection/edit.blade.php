@extends('layouts.admin')
<link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    {{_('Update Collection')}}
                    <a href="{{route('collection.index')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning m-b-5 pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </h3>
            </div>
            <div class="panel-body row">
                {!! Form::model($collection,['url' => route('collection.update',$collection['id'])]) !!}
                {{ csrf_field() }}
                {{method_field('PUT')}}
                @include('admin.collection.form',['submit'=>__('Save')])
                {{ Form::close() }}
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
</div>
@endsection
@section('scripts')
@endsection
