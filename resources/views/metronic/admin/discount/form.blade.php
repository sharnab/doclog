<link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">

<div class="col-md-6 col-md-offset-2">
        <div class="form-group required">
                {{ Form::label('name', __('Name')) }}
                {{ Form::text('name',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('name'))
                        <label id="title-error" class="error" for="name">{{ $errors->first('name') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('code', __('Code')) }}
                {{ Form::text('code',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('code'))
                        <label id="title-error" class="error" for="code">{{ $errors->first('code') }}</label>
                @endif
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" style="padding-right: 0">Discount Type<i style="color: red">*</i></label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="discount_type" value="1" {{ (isset($discount['discount_type'])&&$discount['discount_type']==1)||(old('discount_type') == 1)?'checked':'' }}  > Percentage </label>
                    <label class="radio-inline">
                    <input type="radio" name="discount_type" value="2" {{ (isset($discount['discount_type'])&&$discount['discount_type']==2)||(old('discount_type') == 2)?'checked':'' }}  > Amount </label>
                </div>
            </div>
            @if($errors->has('discount_type'))
                    <label id="status-error" class="error" for="discount_type">{{ $errors->first('discount_type') }}</label>
            @endif
        </div>
        {{-- <div class="form-group required">
                {{ Form::label('discount_type', __('Discount Type')) }}
                {{ Form::radio('discount_type',1,(!isset($discount['discount_type']))||(isset($discount['discount_type'])&&$discount['discount_type']==1)?'checked':'') }} Percentage
                {{ Form::radio('discount_type',2,isset($discount['discount_type'])&&$discount['discount_type']==2?'checked':'') }} Amount
                @if($errors->has('discount_type'))
                        <label id="status-error" class="error" for="discount_type">{{ $errors->first('discount_type') }}</label>
                @endif
        </div> --}}
        <div class="form-group required">
                {{ Form::label('amount', __('Amount/Percentage Value')) }}
                {{ Form::text('amount',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('amount'))
                        <label id="title-error" class="error" for="amount">{{ $errors->first('amount') }}</label>
                @endif
        </div>
        <div class="form-group required">

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
        </div>

        <div class="form-group ">
            <label class="col-md-3" style="padding-left: 0; padding-right: 0;">Applicable For<i style="color: red">*</i></label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline" style="padding-left: 20px;">
                    <input type="radio" name="applicable_for" value="1" {{ (!isset($discount['applicable_for']))||(isset($discount['applicable_for'])&&$discount['applicable_for']==1)?'checked':'' }}  > All </label>
                    <label class="radio-inline">
                    <input type="radio" name="applicable_for" value="2" {{ (isset($discount['applicable_for'])&&$discount['applicable_for']==2)?'checked':'' }}  > By Customer </label>
                </div>
            </div>
        </div>
        {{-- <div class="form-group">
                {{ Form::label('applicable_for', __('Applicable For')) }}
                {{ Form::radio('applicable_for',1,(!isset($discount['applicable_for']))||(isset($discount['applicable_for'])&&$discount['applicable_for'])==1?'checked':'') }} All
                {{ Form::radio('applicable_for',2,isset($discount['applicable_for'])&&$discount['applicable_for']==2?'checked':'') }} By Customer
                @if($errors->has('applicable_for'))
                        <label id="status-error" class="error" for="applicable_for">{{ $errors->first('applicable_for') }}</label>
                @endif
        </div> --}}
        <div class="form-group required" id="customer">
                {{ Form::label('reference_id', __('Customer'),['class'=>'control-label']) }}
                {{ Form::select('reference_id',$allCustomers,null,['placeholder'=>__('None'),'class'=>'select2']) }}
        </div>
        <div class="form-group">
            <label class="col-md-3" style="padding-left: 0; padding-right: 0;">Is Active<i style="color: red">*</i></label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline" style="padding-left: 20px;">
                    <input type="radio" name="active_status" value="1" {{ (isset($discount['active_status'])&&$discount['active_status']==1)||(old('active_status') != 2)?'checked':'' }}  > Yes </label>
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="2" {{ (isset($discount['active_status'])&&$discount['active_status']==2)||(old('active_status') == 2)?'checked':'' }}  > No </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
                {{ Form::button(isset($submit)?$submit:__('Submit'),['type'=>'submit','class'=>'btn btn-info waves-effect waves-light w-md m-b-5'])}}
                <button type="reset" class="btn red">Reset</button>
                <a href="{{ route('discount') }}" class="btn default">Cancel</a>
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

        $('input[type=radio][name=applicable_for]').change(function() {
            if (this.value == '1') {
                $("#customer").hide();
                document.getElementById("customer").classList.remove('required');
            }
            else if (this.value == '2') {
                $("#customer").show();
                document.getElementById("customer").classList.add('required');
            }
        });
        $( document ).ready(function() {
            if ($('input[type=radio][name=applicable_for]').val() == '1') {
                $("#customer").hide();
                document.getElementById("customer").classList.remove('required');
            }
            else if ($("#customer").value == '2') {
                $("#customer").show();
                document.getElementById("customer").classList.add('required');
            }

            $('.datepicker').datepicker({
                dateFormat: 'dd-mm-yy',
                autoclose: true
            });
        });
    </script>
@endsection
