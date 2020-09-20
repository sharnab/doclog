@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title">
                    {{_('Update Account Information')}}
                    <a href="{{route('account_info')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning m-b-5 pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </h3>
            </div>
            <div class="panel-body row">
                {!! Form::model($account_info,['url' => route('account_info_update',$account_info['id'])]) !!}
                {{ csrf_field() }}
                {{method_field('PUT')}}
                @include('admin.account_info.form',['submit'=>__('Save')])
                {{ Form::close() }}
            </div><!-- panel-body -->
        </div> <!-- panel -->
    </div> <!-- col-->
</div>
@endsection
@section('scripts')
@endsection
