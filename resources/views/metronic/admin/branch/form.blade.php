<div class="col-md-6 col-md-offset-2">
        <div class="form-group required">
                {{ Form::label('name', __('Name')) }}
                {{ Form::text('name',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('name'))
                        <label id="title-error" class="error" for="name">{{ $errors->first('name') }}</label>
                @endif
        </div>
        <div class="form-group required">
            <div class="col-md-11" style="padding-left: 0; padding-bottom: 15px;">
                {{ Form::label('bank_id', __('Bank'),['class'=>'control-label']) }}
                {{ Form::select('bank_id',$allBanks,null,['placeholder'=>__('None'),'class'=>'select2']) }}
            </div>
            <div class="col-md-1" style="padding-top: 5.5%; padding-left: 0">
                <a href="{{ route('bank_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
            </div>
        </div>
        <div class="form-group required">
            {{ Form::label('address', __('Address')) }}
                {{ Form::textarea('address',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('address'))
                        <label id="title-error" class="error" for="address">{{ $errors->first('address') }}</label>
                @endif
        </div>
        <div class="form-group">
                {{ Form::label('routing_no', __('Routing Number')) }}
                {{ Form::text('routing_no',null,['class'=>'form-control','required'=>false]) }}
                @if($errors->has('routing_no'))
                        <label id="title-error" class="error" for="routing_no">{{ $errors->first('routing_no') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('contact_no', __('Contact Number')) }}
                {{ Form::text('contact_no',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('contact_no'))
                        <label id="title-error" class="error" for="contact_no">{{ $errors->first('contact_no') }}</label>
                @endif
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Is Active</label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="1" {{ (isset($branch['active_status'])&&$branch['active_status']==1)||(old('active_status') != 2)?'checked':'' }}  > Yes </label>
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="2" {{ (isset($branch['active_status'])&&$branch['active_status']==2)||(old('active_status') == 2)?'checked':'' }}  > No </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
                {{ Form::button(isset($submit)?$submit:__('Submit'),['type'=>'submit','class'=>'btn btn-info waves-effect waves-light w-md m-b-5'])}}
                <button type="reset" class="btn red">Reset</button>
                <a href="{{ route('branch') }}" class="btn default">Cancel</a>
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
