<div class="col-md-6 col-md-offset-2">
        <div class="form-group">
            <label class="col-md-3 control-label" style="padding-left: 0px">SMS Type<i style="color: red">*</i></label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="sms_type" value="1" {{ (isset($smsContent['sms_type'])&&$smsContent['sms_type']==1)||(old('sms_type') != 2)?'checked':'' }}  > Flash SMS </label>
                    <label class="radio-inline">
                    <input type="radio" name="sms_type" value="2" {{ (isset($smsContent['sms_type'])&&$smsContent['sms_type']==2)||(old('sms_type') == 2)?'checked':'' }}  > Regular SMS </label>
                </div>
            </div>
        </div>
        <div class="form-group required">
                {{ Form::label('title', __('Title')) }}
                {{ Form::text('title',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('title'))
                        <label id="title-error" class="error" for="title">{{ $errors->first('title') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('content', __('Content')) }}
                {{ Form::text('content',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('content'))
                        <label id="title-error" class="error" for="content">{{ $errors->first('content') }}</label>
                @endif
        </div>
        <div class="form-group">
                {{ Form::label('description', __('Description')) }}
                {{ Form::textarea('description',null,['class'=>'form-control','required'=>false]) }}
                @if($errors->has('description'))
                        <label id="title-error" class="error" for="description">{{ $errors->first('description') }}</label>
                @endif
        </div>
        <div class="form-group">
                {{ Form::label('remarks', __('Remarks')) }}
                {{ Form::textarea('remarks',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('remarks'))
                        <label id="title-error" class="error" for="remarks">{{ $errors->first('remarks') }}</label>
                @endif
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" style="padding-left: 0px">Status<i style="color: red">*</i></label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="1" {{ (isset($smsContent['active_status'])&&$smsContent['active_status']==1)||(old('active_status') != 2)?'checked':'' }}  > Yes </label>
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="2" {{ (isset($smsContent['active_status'])&&$smsContent['active_status']==2)||(old('active_status') == 2)?'checked':'' }}  > No </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
                {{ Form::button(isset($submit)?$submit:__('Submit'),['type'=>'submit','class'=>'btn btn-info waves-effect waves-light w-md m-b-5'])}}
                <button type="reset" class="btn red">Reset</button>
                <a href="{{ route('sms_content') }}" class="btn default">Cancel</a>
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
        })
    </script>
@endsection
