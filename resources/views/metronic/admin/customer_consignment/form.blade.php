<div class="col-md-6 col-md-offset-2">
        <div class="form-group required">
                {{ Form::label('contact_name', __("Contact Name")) }}
                {{ Form::text('contact_name',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('contact_name'))
                        <label id="title-error" class="error" for="contact_name">{{ $errors->first('contact_name') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('total_bag', __("Total Bag")) }}
                {{ Form::text('total_bag',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('total_bag'))
                        <label id="title-error" class="error" for="total_bag">{{ $errors->first('total_bag') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('seal_number', __("Seal Number/s")) }}
                {{ Form::text('seal_number',null,['class'=>'form-control','required'=>false]) }}
                @if($errors->has('seal_number'))
                        <label id="title-error" class="error" for="seal_number">{{ $errors->first('seal_number') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('courier_receipt_remarks', __("Courier Receipt Text")) }}
                {{ Form::text('courier_receipt_remarks',null,['class'=>'form-control','required'=>false]) }}
                @if($errors->has('courier_receipt_remarks'))
                        <label id="title-error" class="error" for="courier_receipt_remarks">{{ $errors->first('courier_receipt_remarks') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('courier_receipt_date', __("Courier Receipt Date")) }}
                {{ Form::text('courier_receipt_date',null,['class'=>'form-control datetimepicker','required'=>false]) }}
                @if($errors->has('courier_receipt_date'))
                        <label id="title-error" class="error" for="courier_receipt_date">{{ $errors->first('courier_receipt_date') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('courier_receipt_time', __("Courier Receipt Time")) }}
                {{ Form::text('courier_receipt_time',null,['class'=>'form-control timepicker','required'=>false]) }}
                @if($errors->has('courier_receipt_time'))
                        <label id="title-error" class="error" for="courier_receipt_time">{{ $errors->first('courier_receipt_time') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('bank_date', __("Courier Receipt Date")) }}
                {{ Form::text('bank_date',null,['class'=>'form-control datetimepicker','required'=>false]) }}
                @if($errors->has('bank_date'))
                        <label id="title-error" class="error" for="bank_date">{{ $errors->first('bank_date') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('bank_time', __("Courier Receipt Time")) }}
                {{ Form::text('bank_time',null,['class'=>'form-control timepicker','required'=>false]) }}
                @if($errors->has('bank_time'))
                        <label id="title-error" class="error" for="bank_time">{{ $errors->first('bank_time') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('bank_remarks', __("Remarks")) }}
                {{ Form::text('bank_remarks',null,['class'=>'form-control','required'=>false]) }}
                @if($errors->has('bank_remarks'))
                        <label id="title-error" class="error" for="bank_remarks">{{ $errors->first('bank_remarks') }}</label>
                @endif
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Is Active</label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="1" {{ (isset($account_info['active_status'])&&$account_info['active_status']==1)||(old('active_status') != 2)?'checked':'' }}  > Yes </label>
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="2" {{ (isset($account_info['active_status'])&&$account_info['active_status']==2)||(old('active_status') == 2)?'checked':'' }}  > No </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
                {{ Form::button(isset($submit)?$submit:__('Submit'),['type'=>'submit','class'=>'btn btn-info waves-effect waves-light w-md m-b-5'])}}
                <button type="reset" class="btn red">Reset</button>
                <a href="{{ route('account_info') }}" class="btn default">Cancel</a>
        </div>
</div>
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( document ).ready(function() {
        $('.datetimepicker').datetimepicker({
            dateFormat: 'dd-mm-yy',
            autoclose: true
        });

        $('.timepicker').timepicker({
            timeFormat: 'hh:mm:ss',
            autoclose: true
        });
    });
    </script>
@endsection
