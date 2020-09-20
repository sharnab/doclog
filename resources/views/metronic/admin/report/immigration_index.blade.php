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
            <h1>Immigration</h1>
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
            <a href="{{ url('admin/booking') }}">Ticket Sales</a>
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
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['route' => 'generate_departure_card' , 'class' => 'form-horizontal', 'role' => 'form', 'enctype' => 'multipart/form-data']) }}

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

    $('input[name=base_fare]').on('keyup', function (){
        $('input[name=ait]').val(parseFloat($('input[name=base_fare]').val() * parseFloat($('input[name=ait_percentage]').val())));
        $('input[name=airlines_vat]').val(parseFloat(($('input[name=base_fare]').val() * .07) * .15));
        $('input[name=total_fare]').val(parseFloat($('input[name=base_fare]').val()) + parseFloat($('input[name=airlines_vat]').val()) + parseFloat($('input[name=ait]').val()) + parseFloat($('input[name=tax]').val()));
        if(isNaN($('input[name=total_fare]').val())){
            $('input[name=total_fare]').val(0);
        }
    });

    $('input[name=ait_percentage]').on('change', function (){
        if(parseFloat($('input[name=ait_percentage]').val()) >= 0){
            $('input[name=ait]').val(parseFloat($('input[name=base_fare]').val() * parseFloat($('input[name=ait_percentage]').val())));
            $('input[name=total_fare]').val(parseFloat($('input[name=base_fare]').val()) + parseFloat($('input[name=airlines_vat]').val()) + parseFloat($('input[name=ait]').val()) + parseFloat($('input[name=tax]').val()));
        }
        else{
            $('input[name=ait_percentage]').val(0.3);
            $('input[name=ait]').val(parseFloat($('input[name=base_fare]').val() * parseFloat($('input[name=ait_percentage]').val())));
            $('input[name=total_fare]').val(parseFloat($('input[name=base_fare]').val()) + parseFloat($('input[name=airlines_vat]').val()) + parseFloat($('input[name=ait]').val()) + parseFloat($('input[name=tax]').val()));
        }
    });

    $('input[name=tax]').on('keyup', function (){
        $('input[name=total_fare]').val(parseFloat($('input[name=base_fare]').val()) + parseFloat($('input[name=airlines_vat]').val()) + parseFloat($('input[name=ait]').val()) + parseFloat($('input[name=tax]').val()));
        if(isNaN($('input[name=total_fare]').val())){
            $('input[name=total_fare]').val(0);
        }
    });

    $('input[name=discount_amount]').on('keyup', function (){
        if($('input[name="discount_type"]:checked').val() == 1){
            $('input[name=payable_amount]').val(parseFloat($('input[name=total_fare]').val()) - parseFloat($('input[name=discount_amount]').val()));
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        }
        if(isNaN($('input[name=payable_amount]').val())){
            $('input[name=payable_amount]').val(0);
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        }
    });

    $('input[name="discount_type"]').on('change', function (){
        if($('input[name="discount_type"]:checked').val() == 1){
            $('.percentage').hide();
            // $('input[name=payable_amount]').val(parseFloat($('input[name=total_fare]').val()) - parseFloat($('input[name=discount_amount]').val()));
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        } else {
            $('.percentage').show();
            // $('input[name=discount_amount]').val(parseFloat($('input[name=total_fare]').val()) * parseFloat($('input[name=percentage]').val()));
            // $('input[name=payable_amount]').val(parseFloat($('input[name=total_fare]').val()) - parseFloat(parseFloat($('input[name=total_fare]').val()) * (parseFloat($('input[name=discount_amount]').val()) / 100)));
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        }
        if(isNaN($('input[name=payable_amount]').val())){
            $('input[name=payable_amount]').val(0);
            // $('input[name=actual_payable_amount]').val($('input[name=payable_amount]').val());
        }
    });

    $('input[name=percentage]').on('keyup', function (){
        if($('input[name="discount_type"]:checked').val() == 2){
            $('input[name=discount_amount]').val(parseFloat($('input[name=total_fare]').val()) * parseFloat($('input[name=percentage]').val())  / 100);
            $('input[name=payable_amount]').val(parseFloat($('input[name=total_fare]').val()) - parseFloat($('input[name=discount_amount]').val()));
        }
    });
});

</script>
@endsection
