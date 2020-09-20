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
                {{ Form::label('visa_number', __('Visa Number')) }}
                {{ Form::text('visa_number',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('visa_number'))
                        <label id="title-error" class="error" for="visa_number">{{ $errors->first('visa_number') }}</label>
                @endif
        </div>
        <div class="form-group required">
                <div class="col-md-11" style="padding-left: 0; padding-bottom: 15px;">
                {{ Form::label('country_id', __('Country'),['class'=>'control-label']) }}
                {{ Form::select('country_id',$allCountries,null,['placeholder'=>__('None'),'class'=>'select2']) }}
            </div>
            <div class="col-md-1" style="padding-top: 5.5%; padding-left: 0">
                <a href="{{ route('country_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
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
                {{ Form::label('expiry_date', __('Expiry Date')) }}
                {{ Form::text('expiry_date',null,['class'=>'form-control datepicker','required'=>true]) }}
                @if($errors->has('expiry_date'))
                        <label id="title-error" class="error" for="expiry_date">{{ $errors->first('expiry_date') }}</label>
                @endif
        </div>
        <div class="form-group">
            <label class="control-label">Attachment</label>
            <div class="{{ $errors->has('attachment') ? 'has-error' : '' }}">
                @if (isset($visaInfo['attachment']) && !empty($visaInfo['attachment']))
                    <img src="{{url($visaInfo['attachment'])}}" height="100" />
                    <button type="submit" name="delete" value="delete" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this attachement?')">Delete</button>
                @else
                    <input type="file" name="attachment" class="form-control">
                @endif
            </div>
        </div>
        <div class="form-group required">
                {{ Form::label('visa_type', __('Visa Type')) }}
                {{ Form::text('visa_type',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('visa_type'))
                        <label id="title-error" class="error" for="visa_type">{{ $errors->first('visa_type') }}</label>
                @endif
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Status<i style="color: red">*</i></label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="1" {{ (isset($visaInfo['active_status'])&&$visaInfo['active_status']==1)||(old('active_status') != 2)?'checked':'' }}  > Yes </label>
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="2" {{ (isset($visaInfo['active_status'])&&$visaInfo['active_status']==2)||(old('active_status') == 2)?'checked':'' }}  > No </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
                {{ Form::button(isset($submit)?$submit:__('Submit'),['type'=>'submit','class'=>'btn btn-info waves-effect waves-light w-md m-b-5'])}}
                <button type="reset" class="btn red">Reset</button>
                <a href="{{ route('visa_info') }}" class="btn default">Cancel</a>
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

        $( document ).ready(function() {
            $('.datepicker').datepicker({
                dateFormat: 'dd-mm-yy',
                autoclose: true
            });
        });
    </script>
@endsection
