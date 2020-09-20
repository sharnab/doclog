@extends('layouts.admin')
@section('content')

    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Sector <small>Edit</small></h1>
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
            <a href="{{ url('admin/sector') }}">Sector</a>
            <i class="fa fa-circle"></i>
        </li>
        <li>
            <a href="#">Edit</a>
        </li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <div class="portlet box blue-hoki">
                <div class="portlet-title">
                    <div class="caption">
                        <i class="fa fa-home"></i>Edit Sector
                    </div>
                    <a href="{{route('sector')}}" title="Back" class="panel-title-btn btn btn-icon waves-effect waves-light btn-warning btn-back pull-right"> <i class="ion-arrow-return-left"></i> </a>
                </div>
                <div class="portlet-body">
                    @include('layouts.alert')
                    {{ Form::open(['url' => route( 'sector_update',$sector['id'] ) , 'class' => 'form-horizontal', 'role' => 'form']) }}
                        {{method_field('PUT')}}
                        <div class="form-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Name<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('name') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="name" value="{{ old('name') ? old('name') : $sector['name'] }}" placeholder="Sector's Name">
                                        @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Departure Airport<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('departure_airport') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="departure_airport" value="{{ old('departure_airport') ? old('departure_airport') : $sector['departure_airport'] }}" placeholder="Departure airport">
                                        @if ($errors->has('departure_airport'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('departure_airport') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Departure Country<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('departure_country_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2 country" name="departure_country_id" id="departure_country">
                                        <option value=""></option>
                                        @foreach ($allCountries as $countryId => $countryName )
                                        <option value="{{ $countryId }}" {{ $sector['departure_country_id'] == $countryId ? 'selected' : '' }} >
                                            {{ $countryName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('departure_country_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('departure_country_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <button id="pick-icon" type="button" title="Add" class="panel-title-btn btn waves-effect waves-light btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Arrival Airport<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('arrival_airport') ? 'has-error' : '' }}">
                                    <div class="input-icon">
                                        <i class="fa fa-user"></i>
                                        <input type="text" class="form-control" name="arrival_airport" value="{{ old('arrival_airport') ? old('arrival_airport') : $sector['arrival_airport'] }}" placeholder="Arrival airport">
                                        @if ($errors->has('arrival_airport'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('arrival_airport') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label required">Arrival Country<i style="color: red">*</i></label>
                                <div class="col-md-6 {{ $errors->has('arrival_country_id') ? 'has-error' : '' }}">
                                    <select class="form-control select2 country" name="arrival_country_id" id="arrival_country">
                                        <option value=""></option>
                                        @foreach ($allCountries as $countryId => $countryName )
                                        <option value="{{ $countryId }}" {{ $sector['arrival_country_id'] == $countryId ? 'selected' : '' }} >
                                            {{ $countryName }}
                                        </option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('arrival_country_id'))
                                    <span class="help-block has-error">
                                        <strong>{{ $errors->first('arrival_country_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                                <div class="col-md-3">
                                    <button id="pick-icon" type="button" title="Add" class="panel-title-btn btn waves-effect waves-light btn-success" data-toggle="modal" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></button>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Type<i style="color: red">*</i></label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="type" value="1" {{ $sector['type'] == 1 ? 'checked' : '' }}  > International </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="type" value="2" {{ $sector['type'] == 2 ? 'checked' : '' }}  > Local </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label">Status<i style="color: red">*</i></label>
                                <div class="col-md-6">
                                    <div class="radio-list">
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="1" {{ $sector['active_status'] == 1 ? 'checked' : '' }}  > Yes </label>
                                        <label class="radio-inline">
                                        <input type="radio" name="active_status" value="2" {{ $sector['active_status'] == 2 ? 'checked' : '' }}  > No </label>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="form-actions">
                            <div class="row">
                                <div class="col-md-offset-3 col-md-6">
                                    <button type="submit" class="btn green">Submit</button>
                                    <button type="reset" class="btn red">Reset</button>
                                    <a href="{{ route('sector') }}" class="btn default">Cancel</a>
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
<script type="text/javascript">
$('.country').select2({
    placeholder: "select a country",
    tags:true
});
</script>
@endsection
