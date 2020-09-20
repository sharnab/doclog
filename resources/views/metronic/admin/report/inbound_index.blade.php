<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>

@extends('layouts.admin')
@section('extra_css')
<style type="text/css">
    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }
</style>
<link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">
@endsection

@section('content')
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Inbound Card</h1>
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
            <a href="#">Inbound Card</a>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['route' => 'generate_inbound_form' , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}

                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Ticket Number</label>
                                <div class="col-md-6 {{ $errors->has('booking_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2 passenger" name="booking_id" id="booking">
                                        <option value=""></option>
                                        @foreach ($allBookings as $bookingId => $ticket_number )
                                        <option value="{{ $bookingId }}" {{ (old('booking_id') == $bookingId) ? 'selected' : '' }} >
                                            {{ $ticket_number }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('booking_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('booking_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <a href="{{ route('booking_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                </div>
                            </div>
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>

@endsection
@section('scripts')
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">

$.ajaxSetup({
    headers: {
        'CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$('#passenger').select2({
    placeholder: "select a passenger",
    allowClear: true
});

$('#agency').select2({
    placeholder: "select a agency",
    allowClear: true
});

$('#reference').select2({
    placeholder: "select a reference",
    allowClear: true
});

$('#airline').select2({
    placeholder: "select a airline",
    tags:true
});

$('#staff').select2({
    placeholder: "select a staff",
    tags:true
});

$('#currency').select2({
    placeholder: "select a currecy",
    tags:true
});

$(document).ready(function() {
    $('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        autoclose: true
    });

});

</script>
@endsection
