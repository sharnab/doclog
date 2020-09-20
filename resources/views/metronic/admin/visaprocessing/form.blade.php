<link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">

<div class="col-md-6 col-md-offset-2">
        <div class="form-group required">
            <div class="col-md-11" style="padding-left: 0; padding-bottom: 15px;">
                {{ Form::label('passenger_id', __('Passenger'),['class'=>'control-label']) }}
                {{ Form::select('passenger_id',$allPassengers,null,['placeholder'=>__('None'),'class'=>'select2']) }}
            </div>
            <div class="col-md-1" style="padding-top: 5.5%; padding-left: 0">
                <a href="{{ route('passenger_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
            </div>
        </div>
        <div class="form-group required">
            <div class="col-md-11" style="padding-left: 0; padding-bottom: 15px;">
                {{ Form::label('agency_id', __('Agency'),['class'=>'control-label']) }}
                {{ Form::select('agency_id',$allAgencies,null,['placeholder'=>__('None'),'class'=>'select2']) }}
            </div>
            <div class="col-md-1" style="padding-top: 5.5%; padding-left: 0">
                <a href="{{ route('agency_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
            </div>
        </div>
        <div class="form-group required">
                {{ Form::label('issue_date', __('Issue Date')) }}
                {{ Form::text('issue_date',null,['class'=>'form-control datepicker','required'=>true]) }}
                @if($errors->has('issue_date'))
                        <label id="title-error" class="error" for="issue_date">{{ $errors->first('issue_date') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('acceptance_date', __('Acceptance Date')) }}
                {{ Form::text('acceptance_date',null,['class'=>'form-control datepicker','required'=>true]) }}
                @if($errors->has('acceptance_date'))
                        <label id="title-error" class="error" for="acceptance_date">{{ $errors->first('acceptance_date') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('return_date', __('Return Date')) }}
                {{ Form::text('return_date',null,['class'=>'form-control datepicker','required'=>true]) }}
                @if($errors->has('return_date'))
                        <label id="title-error" class="error" for="return_date">{{ $errors->first('return_date') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('visa_fee', __('Visa Fee')) }}
                {{ Form::text('visa_fee',null,['class'=>'form-control visa_fee','required'=>true]) }}
                @if($errors->has('visa_fee'))
                        <label id="title-error" class="error" for="visa_fee">{{ $errors->first('visa_fee') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('processing_fee', __('Processing Fee')) }}
                {{ Form::text('processing_fee',null,['class'=>'form-control processing_fee','required'=>true]) }}
                @if($errors->has('processing_fee'))
                        <label id="title-error" class="error" for="processing_fee">{{ $errors->first('processing_fee') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('bank_fee', __('Bank Fee')) }}
                {{ Form::text('bank_fee',null,['class'=>'form-control bank_fee','required'=>true]) }}
                @if($errors->has('bank_fee'))
                        <label id="title-error" class="error" for="bank_fee">{{ $errors->first('bank_fee') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('service_charge', __('Service Charge')) }}
                {{ Form::text('service_charge',null,['class'=>'form-control service_charge','required'=>true]) }}
                @if($errors->has('service_charge'))
                        <label id="title-error" class="error" for="service_charge">{{ $errors->first('service_charge') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('discount', __('Discount')) }}
                {{ Form::text('discount',null,['class'=>'form-control discount','required'=>true]) }}
                @if($errors->has('discount'))
                        <label id="title-error" class="error" for="discount">{{ $errors->first('discount') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('total', __('Total')) }}
                {{ Form::text('total',null,['class'=>'form-control total','required'=>true]) }}
                @if($errors->has('total'))
                        <label id="title-error" class="error" for="total">{{ $errors->first('total') }}</label>
                @endif
        </div>
        {{-- <div class="form-group  required">

                {{ Form::label('from_date', __('Date Range')) }}
                <div class="input-group input-large date-picker input-daterange" data-date="" data-date-format="dd-mm-yyyy" data-date-format="dd-mm-yyyy" >
                    {{ Form::text('from_date',null,['class'=>'form-control datepicker','required'=>true]) }}
                    <span class="input-group-addon">To</span>
                    {{ Form::text('to_date',null,['class'=>'form-control datepicker','required'=>true]) }}
                </div>
                @if($errors->has('from_date'))
                    <label id="title-error" class="error" for="from_date">{{ $errors->first('from_date') }}</label>
                @endif
                @if($errors->has('to_date'))
                        <label id="title-error" class="error" for="to_date">{{ $errors->first('to_date') }}</label>
                @endif
        </div> --}}
        <div class="form-group text-center">
                {{ Form::button(isset($submit)?$submit:__('Submit'),['type'=>'submit','class'=>'btn btn-info waves-effect waves-light w-md m-b-5'])}}
                <button type="reset" class="btn red">Reset</button>
                <a href="{{ route('visa_processing') }}" class="btn default">Cancel</a>
        </div>
</div>
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>

        jQuery(".select2").select2({
            width: '100%'
        });
        $(document).on('change','#uri',function () {
           $('#url').val($(this).val())
        });
        $('#icon-list').on('click','p',function () {
            var icon = $(this).find('i').attr('class');
            $('#icon').val(icon);
            $('.modal').modal('toggle');
            $('#pick-icon').find('i').attr('class',icon);
        });

        $(document).ready(function() {
            if($('input[name=visa_fee]').val() == ''){
                $('input[name=visa_fee]').val(0);
            }
            if($('input[name=processing_fee]').val() == ''){
                $('input[name=processing_fee]').val(0);
            }
            if($('input[name=bank_fee]').val() == ''){
                $('input[name=bank_fee]').val(0);
            }
            if($('input[name=service_charge]').val() == ''){
                $('input[name=service_charge]').val(0);
            }
            if($('input[name=discount]').val() == ''){
                $('input[name=discount]').val(0);
            }
            if($('input[name=total]').val() == ''){
                $('input[name=total]').val(0);
            }

            $('.datepicker').datepicker({
                dateFormat: 'dd-mm-yy',
                autoclose: true
            });

            $('input[name=visa_fee]').on('keyup', function() {
                calculation();
                data_show();

            });
            $('input[name=processing_fee]').on('keyup', function() {
                calculation();
                data_show();
            });
            $('input[name=bank_fee]').on('keyup', function() {
                calculation();
                data_show();
            });
            $('input[name=service_charge]').on('keyup', function() {
                calculation();
                data_show();
            });
            $('input[name=discount]').on('keyup', function() {
                calculation();
                data_show();
            });

            function calculation(){
                var visa_fee        = (parseFloat($('input[name=visa_fee]').val())>=0)?parseFloat($('input[name=visa_fee]').val()):0;
                var processing_fee  = (parseFloat($('input[name=processing_fee]').val())>=0)?parseFloat($('input[name=processing_fee]').val()):0;
                var bank_fee        = (parseFloat($('input[name=bank_fee]').val())>=0)?parseFloat($('input[name=bank_fee]').val()):0;
                var service_charge  = (parseFloat($('input[name=service_charge]').val())>=0)?parseFloat($('input[name=service_charge]').val()):0;
                var discount        = (parseFloat($('input[name=discount]').val())>=0)?parseFloat($('input[name=discount]').val()):0;

                $('input[name=total]').val((visa_fee + processing_fee + bank_fee + service_charge) - discount);
            }

            function data_show(){
                if(isNaN(parseFloat($('input[name=visa_fee]').val()))){
                    $('input[name=visa_fee]').val(0);
                }
                if(isNaN(parseFloat($('input[name=processing_fee]').val()))){
                    $('input[name=processing_fee]').val(0);
                }
                if(isNaN(parseFloat($('input[name=bank_fee]').val()))){
                    $('input[name=bank_fee]').val(0);
                }
                if(isNaN(parseFloat($('input[name=service_charge]').val()))){
                    $('input[name=service_charge]').val(0);
                }
                if(isNaN(parseFloat($('input[name=discount]').val()))){
                    $('input[name=discount]').val(0);
                }
            }
        });
    </script>
@endsection
