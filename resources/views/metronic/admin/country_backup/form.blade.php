<div class="col-md-6 col-md-offset-2">
        <div class="form-group required">
                {{ Form::label('title', __('Country Name')) }}
                {{ Form::text('title',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('title'))
                        <label id="title-error" class="error" for="title">{{ $errors->first('title') }}</label>
                @endif
        </div>
        <div class="form-group required">
            {{ Form::label('title_bn', __('Country Name Bangla')) }}
                {{ Form::text('title_bn',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('title_bn'))
                        <label id="title-error" class="error" for="title_bn">{{ $errors->first('title_bn') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('display_sequence', __('Display Sequence')) }}
                {{ Form::number('display_sequence',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('display_sequence'))
                        <label id="title-error" class="error" for="display_sequence">{{ $errors->first('display_sequence') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('code', __('Code')) }}
                {{ Form::text('code',null,['class'=>'form-control','required'=>true,'style'=>"text-transform:uppercase"]) }}
                @if($errors->has('code'))
                        <label id="title-error" class="error" for="code">{{ $errors->first('code') }}</label>
                @endif
        </div>
        <!-- <div class="form-group">
                {{ Form::label('region_id', __('Region'),['class'=>'control-label']) }}
                {{ Form::select('region_id',$allRegions,null,['placeholder'=>__('None'),'class'=>'select2']) }}
        </div> -->
        <!-- <div class="form-group">
                {{ Form::label('active_status', __('Is Default')) }}
                {{ Form::checkbox('is_default',1,isset($country['is_default'])&&$country['is_default']==1?true:false) }}
                @if($errors->has('is_default'))
                        <label id="status-error" class="error" for="is_default">{{ $errors->first('is_default') }}</label>
                @endif
        </div> -->
        <div class="form-group">
            <label class="col-md-3 control-label">Is Active</label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="1" {{ (isset($country['active_status'])&&$country['active_status']==1)||(old('active_status') != 2)?'checked':'' }}  > Yes </label>
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="2" {{ (isset($country['active_status'])&&$country['active_status']==2)||(old('active_status') == 2)?'checked':'' }}  > No </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
                {{ Form::button(isset($submit)?$submit:__('Submit'),['type'=>'submit','class'=>'btn btn-info waves-effect waves-light w-md m-b-5'])}}
                <button type="reset" class="btn red">Reset</button>
                <a href="{{ route('country') }}" class="btn default">Cancel</a>
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
