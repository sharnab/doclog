<link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">

<div class="col-md-6 col-md-offset-2">
        <div class="form-group required">
                {{ Form::label('name', __('Name')) }}
                {{ Form::text('name',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('name'))
                        <label id="title-error" class="error" for="name">{{ $errors->first('name') }}</label>
                @endif
        </div>
        <div class="form-group">
                {{ Form::label('short_name', __('Short Name')) }}
                {{ Form::text('short_name',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('short_name'))
                        <label id="title-error" class="error" for="short_name">{{ $errors->first('short_name') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('address', __('Address')) }}
                {{ Form::textarea('address',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('address'))
                        <label id="title-error" class="error" for="address">{{ $errors->first('address') }}</label>
                @endif
        </div>
        <div class="form-group">
            <label class="col-md-3" style="padding-left: 0; padding-right: 0;">Is Active<i style="color: red">*</i></label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline" style="padding-left: 20px;">
                    <input type="radio" name="active_status" value="1" {{ (isset($company['active_status'])&&$company['active_status']==1)||(old('active_status') != 2)?'checked':'' }}  > Yes </label>
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="2" {{ (isset($company['active_status'])&&$company['active_status']==2)||(old('active_status') == 2)?'checked':'' }}  > No </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
                {{ Form::button(isset($submit)?$submit:__('Submit'),['type'=>'submit','class'=>'btn btn-info waves-effect waves-light w-md m-b-5'])}}
                <button type="reset" class="btn red">Reset</button>
                <a href="{{ route('company') }}" class="btn default">Cancel</a>
        </div>
</div>
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>

        jQuery(".select2").select2({
            width: '100%'
        });

    </script>
@endsection
