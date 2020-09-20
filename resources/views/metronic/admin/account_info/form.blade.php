<div class="col-md-6 col-md-offset-2">
        <div class="form-group required">
            <div class="col-md-11" style="padding-left: 0; padding-bottom: 15px;">
                {{ Form::label('customer_id', __('Customer'),['class'=>'control-label']) }}
                {{ Form::select('customer_id',$allCustomers,null,['placeholder'=>__('None'),'class'=>'select2']) }}
            </div>
            <div class="col-md-1" style="padding-top: 5.5%; padding-left: 0">
                <a href="{{ route('customer_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
            </div>
        </div>
        <div class="form-group required">
                {{ Form::label('account_name', __("Account Holder's Name")) }}
                {{ Form::text('account_name',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('account_name'))
                        <label id="title-error" class="error" for="account_name">{{ $errors->first('account_name') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('account_no', __("Account Number")) }}
                {{ Form::text('account_no',null,['class'=>'form-control','required'=>true]) }}
                @if($errors->has('account_no'))
                        <label id="title-error" class="error" for="account_no">{{ $errors->first('account_no') }}</label>
                @endif
        </div>
        <div class="form-group required">
                {{ Form::label('TIN', __("TIN")) }}
                {{ Form::text('TIN',null,['class'=>'form-control','required'=>false]) }}
                @if($errors->has('TIN'))
                        <label id="title-error" class="error" for="TIN">{{ $errors->first('TIN') }}</label>
                @endif
        </div>
        <div class="form-group required">
                <div class="col-md-11" style="padding-left: 0; padding-bottom: 15px;">
                    {{ Form::label('bank_id', __('Bank'),['class'=>'control-label']) }}
                    {{ Form::select('bank_id',$allBanks,null,['placeholder'=>__('None'),'class'=>'select2', 'id' => 'select_bank']) }}
                </div>
                <div class="col-md-1" style="padding-top: 5.5%; padding-left: 0">
                    <a href="{{ route('bank_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
                </div>
        </div>
        <div class="form-group required">
            <div class="col-md-11" style="padding-left: 0; padding-bottom: 15px;">
                {{ Form::label('branch_id', __('Branch'),['class'=>'control-label']) }}
                {{ Form::select('branch_id',[],null,['placeholder'=>__('None'),'class'=>'select2', 'id' => 'select_branch']) }}
            </div>
            <div class="col-md-1" style="padding-top: 5.5%; padding-left: 0">
                <a href="{{ route('branch_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
            </div>
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Currency</label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="currency" value="1" {{ (isset($account_info['currency'])&&$account_info['currency']==1)||(old('currency') == 1)?'checked':'' }}  > BDT </label>
                    <label class="radio-inline">
                    <input type="radio" name="currency" value="2" {{ (isset($account_info['currency'])&&$account_info['currency']==2)||(old('currency') == 2)?'checked':'' }}  > USD </label>
                </div>
                @if($errors->has('currency'))
                        <label id="status-error" class="error" for="currency">{{ $errors->first('currency') }}</label>
                @endif
            </div>
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
        $('#select_bank').on('load', function(){
            var id = $(this).val();
            $.ajax({
                   url: 'getBranchesByBank/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){
                        var len = 0;
                        if(response['data'] != null){
                          len = response['data'].length;
                        }

                        if(len > 0){
                            $("#select_branch").empty();
                            // Read data and create <option >
                            for(var i=0; i<len; i++){
                               var id = response['data'][i].id;
                               var name = response['data'][i].name;

                               var option = "<option value='"+id+"'>"+name+"</option>";

                               $("#select_branch").append(option);
                            }
                        }
                   },
                   error: function() {
                       $("#select_branch").empty();
                       var option = "<option value=''>None</option>";
                       $("#select_branch").append(option);
                   }
            });
        });
        $('#select_bank').change(function(){
            var id = $(this).val();
            $.ajax({
                   url: 'getBranchesByBank/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){
                       console.log(response);
                        var len = 0;
                        if(response['data'] != null){
                          len = response['data'].length;
                        }

                        if(len > 0){
                            // Read data and create <option >
                            $("#select_branch").empty();
                            for(var i=0; i<len; i++){
                               var id = response['data'][i].id;
                               var name = response['data'][i].name;

                               var option = "<option value='"+id+"'>"+name+"</option>";

                               $("#select_branch").append(option);
                            }
                        }
                   },
                   error: function() {
                       $("#select_branch").empty();
                       var option = "<option value=''>None</option>";
                       $("#select_branch").append(option);
                   }
            });
        });
        $('document').ready(function(){
            var id = $('#select_bank').val();
            if(id){
                $.ajax({
                       url: '../getBranchesByBank/'+id,
                       type: 'get',
                       dataType: 'json',
                       success: function(response){
                           console.log(response);
                            var len = 0;
                            if(response['data'] != null){
                              len = response['data'].length;
                            }

                            if(len > 0){
                                // Read data and create <option >
                                $("#select_branch").empty();
                                for(var i=0; i<len; i++){
                                   var id = response['data'][i].id;
                                   var name = response['data'][i].name;

                                   var option = "<option value='"+id+"'>"+name+"</option>";

                                   $("#select_branch").append(option);
                                }
                            }
                       },
                       error: function() {
                           $("#select_branch").empty();
                           var option = "<option value=''>None</option>";
                           $("#select_branch").append(option);
                       }
                });
            }
        });
    </script>
@endsection
