<style>
#title-error{
    color: red;
}
</style>

<div class="col-md-6 col-md-offset-2">
        <div class="form-group required">
            <div class="col-md-11" style=" padding-bottom: 15px;">
                {{ Form::label('booking_id', __('Invoice'),['class'=>'control-label']) }}
                {{ Form::select('booking_id',$allBookings,null,['placeholder'=>__('None'),'class'=>'select2', 'id' => 'select_invoice']) }}
            </div>
            <div class="col-md-1" style="padding-top: 5.5%; padding-left: 0">
                <a href="{{ route('booking_create') }}" class="panel-title-btn btn waves-effect waves-light btn-success" data-target=".bs-example-modal-lg"><i class="ion-plus"></i></a>
            </div>
        </div>
        <div class="form-group col-md-6">
                {{ Form::label('customer_name', __("Customer's Name"), array('class' => 'required')) }}
                {{ Form::text('customer_name',null,['class'=>'form-control','required'=>false, 'readonly'=>true, 'id' => 'customer_name']) }}
                @if($errors->has('customer_name'))
                        <label id="title-error" class="error" for="customer_name">{{ $errors->first('customer_name') }}</label>
                @endif
        </div>
        <div class="form-group col-md-6">
                {{ Form::label('passenger_name', __("Passenger's Name")) }}
                {{ Form::text('passenger_name',null,['class'=>'form-control','required'=>false, 'readonly'=>true, 'id' => 'passenger_name']) }}
                @if($errors->has('passenger_name'))
                        <label id="title-error" class="error" for="passenger_name">{{ $errors->first('passenger_name') }}</label>
                @endif
        </div>
        <div class="form-group col-md-12">
                {{ Form::label('ticket_number', __("Ticket Number")) }}
                {{ Form::text('ticket_number',null,['class'=>'form-control','required'=>false, 'readonly'=>true, 'id' => 'ticket_number']) }}
                @if($errors->has('ticket_number'))
                        <label id="title-error" class="error" for="ticket_number">{{ $errors->first('ticket_number') }}</label>
                @endif
        </div>
        <div class="form-group col-md-6">
                {{ Form::label('due_date', __("Due Date")) }}
                {{ Form::text('due_date',null,['class'=>'form-control','required'=>false, 'readonly'=>true, 'id' => 'due_date']) }}
                @if($errors->has('due_date'))
                        <label id="title-error" class="error" for="due_date">{{ $errors->first('due_date') }}</label>
                @endif
        </div>
        <div class="form-group col-md-6">
                {{ Form::label('due_amount', __("Due Amount")) }}
                {{ Form::text('due_amount',null,['class'=>'form-control','required'=>false, 'readonly'=>true, 'id' => 'due_amount']) }}
                @if($errors->has('due_amount'))
                        <label id="title-error" class="error" for="due_amount">{{ $errors->first('due_amount') }}</label>
                @endif
        </div>
        <div class="form-group col-md-6 required">
                {{ Form::label('collection_amount', __("Collection Amount")) }}
                {{ Form::text('collection_amount',null,['class'=>'form-control','required'=>true, 'id' => 'collection_amount']) }}
                @if($errors->has('collection_amount'))
                        <label id="title-error" class="error" for="collection_amount">{{ $errors->first('collection_amount') }}</label>
                @endif
        </div>
        <div class="form-group col-md-6 required">
                {{ Form::label('collection_date', __("Collection Date")) }}
                {{ Form::text('collection_date',null,['class'=>'form-control datepicker','required'=>true, 'id' => 'collection_date']) }}
                @if($errors->has('collection_date'))
                        <label id="title-error" class="error" for="collection_date">{{ $errors->first('collection_date') }}</label>
                @endif
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label" style="padding-right: 0; font-size: 13px">Payment Type<i style="color: red">*</i></label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="payment_type" id="payment_type" value="1" {{ (isset($collection['payment_type'])&&$collection['payment_type']==1)||(old('payment_type') == 1)?'checked':'' }}  > Cash </label>
                    <label class="radio-inline">
                    <input type="radio" name="payment_type" id="payment_type" value="2" {{ (isset($collection['payment_type'])&&$collection['payment_type']==2)||(old('payment_type') == 2)?'checked':'' }}  > Bank </label>
                    <label class="radio-inline">
                    <input type="radio" name="payment_type" id="payment_type" value="3" {{ (isset($collection['payment_type'])&&$collection['payment_type']==3)||(old('payment_type') == 3)?'checked':'' }}  > Card </label>
                    <label class="radio-inline">
                    <input type="radio" name="payment_type" id="payment_type" value="4" {{ (isset($collection['payment_type'])&&$collection['payment_type']==4)||(old('payment_type') == 4)?'checked':'' }}  > Mobile </label>
                </div>
            </div>
            @if($errors->has('payment_type'))
                    <label id="status-error" class="error" for="payment_type">{{ $errors->first('payment_type') }}</label>
            @endif
        </div>
        {{-- <div class="form-group col-md-12 required">
                {{ Form::label('payment_type', __('Payment Type')) }}
                {{ Form::radio('payment_type',1,isset($collection['payment_type'])&&$collection['payment_type']==1?'checked':'') }} Cash
                {{ Form::radio('payment_type',2,isset($collection['payment_type'])&&$collection['payment_type']==2?'checked':'') }} Bank
                {{ Form::radio('payment_type',3,isset($collection['payment_type'])&&$collection['payment_type']==3?'checked':'') }} Card
                {{ Form::radio('payment_type',4,isset($collection['payment_type'])&&$collection['payment_type']==4?'checked':'') }} Mobile
                @if($errors->has('payment_type'))
                        <label id="status-error" class="error" for="payment_type">{{ $errors->first('payment_type') }}</label>
                @endif
        </div> --}}
        <div class="ref_cash">
            <div class="form-group col-md-12 ">
                {{ Form::label('cash_ref_id', __("Deposit Account Number ")) }}
                {{ Form::text('cash_ref_id',null,['class'=>'form-control', 'id' => 'cash_ref_id']) }}
                @if($errors->has('cash_ref_id'))
                        <label id="title-error" class="error" for="cash_ref_id">{{ $errors->first('cash_ref_id') }}</label>
                @endif
            </div>
        </div>
        <div class="ref_bank col-md-12">
            <div class="form-group col-md-6">
                    {{ Form::label('bank_id', __('Bank'),['class'=>'control-label']) }}
                    {{ Form::select('bank_id',$allBanks,null,['placeholder'=>__('None'),'class'=>'select2', 'id' => 'select_bank']) }}
            </div>
            <div class="form-group col-md-6">
                    {{ Form::label('branch_ref_id', __('Branch'),['class'=>'control-label']) }}
                    {{ Form::select('branch_ref_id',[],null,['placeholder'=>__('None'),'class'=>'select2', 'id' => 'select_branch']) }}
            </div>
        </div>
        <div class="form-group ref_card  col-md-12">
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="card_payment_ref_id" value="1" {{ (isset($collection['card_payment_ref_id'])&&$collection['card_payment_ref_id']==1)||(old('card_payment_ref_id') == 1)?'checked':'' }}  > <img src="{{url('/')}}/assets/admin/layout/img/visa.png"}} height="50" /> </label>
                    <label class="radio-inline">
                    <input type="radio" name="card_payment_ref_id" value="2" {{ (isset($collection['card_payment_ref_id'])&&$collection['card_payment_ref_id']==2)||(old('card_payment_ref_id') == 2)?'checked':'' }}  > <img src="{{url('/')}}/assets/admin/layout/img/mastercard.jpg"}} height="50" /> </label>
                    <label class="radio-inline">
                    <input type="radio" name="card_payment_ref_id" value="3" {{ (isset($collection['card_payment_ref_id'])&&$collection['card_payment_ref_id']==3)||(old('card_payment_ref_id') == 3)?'checked':'' }}  > <img src="{{url('/')}}/assets/admin/layout/img/american-express.jpg"}} height="50" /> </label>
                </div>
            </div>
            @if($errors->has('payment_type'))
                    <label id="status-error" class="error" for="card_payment_ref_id">{{ $errors->first('card_payment_ref_id') }}</label>
            @endif
        </div>
        {{-- <div class="ref_card">
            <div class="form-group col-md-12 ">
                    {{ Form::radio('card_payment_ref_id',1,isset($collection['card_payment_ref_id'])&&$collection['card_payment_ref_id']==1?'checked':'') }} <img src="{{url('/')}}/assets/admin/layout/img/visa.png"}} height="50" />
                    {{ Form::radio('card_payment_ref_id',2,isset($collection['card_payment_ref_id'])&&$collection['card_payment_ref_id']==2?'checked':'') }} <img src="{{url('/')}}/assets/admin/layout/img/mastercard.jpg"}} height="50" />
                    {{ Form::radio('card_payment_ref_id',3,isset($collection['card_payment_ref_id'])&&$collection['card_payment_ref_id']==3?'checked':'') }} <img src="{{url('/')}}/assets/admin/layout/img/american-express.jpg"}} height="50" />
                    @if($errors->has('card_payment_ref_id'))
                            <label id="status-error" class="error" for="card_payment_ref_id">{{ $errors->first('card_payment_ref_id') }}</label>
                    @endif
                </div>
        </div> --}}
        <div class="form-group ref_mobile  col-md-12">
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="mobile_ref_id" value="1" {{ (isset($collection['mobile_ref_id'])&&$collection['mobile_ref_id']==1)||(old('mobile_ref_id') == 1)?'checked':'' }}  > <img src="{{url('/')}}/assets/admin/layout/img/bkash.jpg"}} height="50" /> </label>
                    <label class="radio-inline">
                    <input type="radio" name="mobile_ref_id" value="2" {{ (isset($collection['mobile_ref_id'])&&$collection['mobile_ref_id']==2)||(old('mobile_ref_id') == 2)?'checked':'' }}  > <img src="{{url('/')}}/assets/admin/layout/img/nagad.png"}} height="50" /> </label>
                    <label class="radio-inline">
                    <input type="radio" name="mobile_ref_id" value="3" {{ (isset($collection['mobile_ref_id'])&&$collection['mobile_ref_id']==3)||(old('mobile_ref_id') == 3)?'checked':'' }}  > <img src="{{url('/')}}/assets/admin/layout/img/rocket.png"}} height="50" /> </label>
                </div>
            </div>
            @if($errors->has('payment_type'))
                    <label id="status-error" class="error" for="mobile_ref_id">{{ $errors->first('mobile_ref_id') }}</label>
            @endif
        </div>
        {{-- <div class="ref_mobile">
                <div class="form-group col-md-12 ">
                    {{ Form::radio('mobile_ref_id',1,isset($collection['mobile_ref_id'])&&$collection['mobile_ref_id']==1?'checked':'') }}  <img src="{{url('/')}}/assets/admin/layout/img/bkash.jpg"}} height="50" />
                    {{ Form::radio('mobile_ref_id',2,isset($collection['mobile_ref_id'])&&$collection['mobile_ref_id']==2?'checked':'') }}  <img src="{{url('/')}}/assets/admin/layout/img/nagad.png"}} height="50" />
                    {{ Form::radio('mobile_ref_id',3,isset($collection['mobile_ref_id'])&&$collection['mobile_ref_id']==3?'checked':'') }}  <img src="{{url('/')}}/assets/admin/layout/img/rocket.png"}} height="50" />
                    @if($errors->has('mobile_ref_id'))
                        <label id="status-error" class="error" for="mobile_ref_id">{{ $errors->first('mobile_ref_id') }}</label>
                    @endif
                </div>
        </div> --}}
        <div class="ref_transaction">
            <div class="form-group col-md-12 ">
                {{ Form::label('transaction_id', __("Transaction ID")) }}.<i style='color: red'>*</i>
                {{ Form::text('transaction_id',null,['class'=>'form-control']) }}
                @if($errors->has('transaction_id'))
                        <label id="title-error" class="error" for="transaction_id">{{ $errors->first('transaction_id') }}</label>
                @endif
            </div>
        </div>
        <div class="form-group col-md-12 ">
            {{ Form::label('remarks', __("Description")) }}
            {{ Form::textarea('remarks',null,['class'=>'form-control','required'=>false]) }}
            @if($errors->has('remarks'))
                    <label id="title-error" class="error" for="remarks">{{ $errors->first('remarks') }}</label>
            @endif
        </div>
        <div class="form-group">
            <label class="col-md-3 control-label">Is Active<i style="color: red">*</i></label>
            <div>
                <div class="radio-list">
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="1" {{ (isset($collection['active_status'])&&$collection['active_status']==1)||(old('active_status') != 2)?'checked':'' }}  > Yes </label>
                    <label class="radio-inline">
                    <input type="radio" name="active_status" value="2" {{ (isset($collection['active_status'])&&$collection['active_status']==2)||(old('active_status') == 2)?'checked':'' }}  > No </label>
                </div>
            </div>
        </div>
        <div class="form-group text-center">
                {{ Form::button(isset($submit)?$submit:__('Submit'),['type'=>'submit','class'=>'btn btn-info waves-effect waves-light w-md m-b-5'])}}
                <button type="reset" class="btn red">Reset</button>
                <a href="{{ route('collection.index') }}" class="btn default">Cancel</a>
        </div>
</div>
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
        jQuery(".select2").select2({
            width: '100%'
        });
        $('.datepicker').datepicker({
            dateFormat: 'dd-mm-yy',
            autoclose: true
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
                   url: 'getBranches/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){
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
        $('#select_bank').change(function(){
            var id = $(this).val();
            $.ajax({
                   url: '{{URL('getBranches')}}/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){
                        var len = 0;
                        $("#select_branch").empty();
                        if(response['data'] != null){
                          len = response['data'].length;
                        }

                        if(len > 0){
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
        $('#select_invoice').change(function(){
            var id = $(this).val();
            $.ajax({
                   url: '{{URL('getInvoice')}}/'+id,
                   type: 'get',
                   dataType: 'json',
                   success: function(response){
                       console.log(response);
                        if(response != null){
                            $("#customer_name").val(response.customer_name);
                            $("#passenger_name").val(response.passenger_name);
                            $("#ticket_number").val(response.ticket_number);
                            $("#due_date").val(response.due_date);
                            $("#due_amount").val(response.due_amount);
                        }

                   }
            });
        });
        $("[name=payment_type]").on('click', function(){
            var value = $(this).val();
            if(value == 1){
                $('.ref_cash').show();
                $('.ref_card').hide();
                $('.ref_bank').hide();
                $('.ref_mobile').hide();
                $('.ref_transaction').hide();
            }
            else if(value == 2){
                $('.ref_cash').hide();
                $('.ref_card').hide();
                $('.ref_bank').show();
                $('.ref_mobile').hide();
                $('.ref_transaction').show();
            }
            else if(value == 3){
                $('.ref_cash').hide();
                $('.ref_card').show();
                $('.ref_bank').hide();
                $('.ref_mobile').hide();
                $('.ref_transaction').show();
            }
            else if(value == 4){
                $('.ref_cash').hide();
                $('.ref_card').hide();
                $('.ref_bank').hide();
                $('.ref_mobile').show();
                $('.ref_transaction').show();
            }
            else {
                $('.ref_cash').hide();
                $('.ref_card').hide();
                $('.ref_bank').hide();
                $('.ref_mobile').hide();
                $('.ref_transaction').hide();
            }
        });

        $(document).ready( function (){
            var value = ($("input[name=payment_type]:checked").val());
            // var value = $("input[name=payment_type]").val();
            // alert(value);
            if(value == 1){
                $('.ref_cash').show();
                $('.ref_card').hide();
                $('.ref_bank').hide();
                $('.ref_mobile').hide();
                $('.ref_transaction').hide();
            }
            else if(value == 2){
                $('.ref_cash').hide();
                $('.ref_card').hide();
                $('.ref_bank').show();
                $('.ref_mobile').hide();
                $('.ref_transaction').show();
            }
            else if(value == 3){
                $('.ref_cash').hide();
                $('.ref_card').hide();
                $('.ref_bank').hide();
                $('.ref_mobile').show();
                $('.ref_transaction').show();
            }
            else if(value == 4){
                $('.ref_cash').hide();
                $('.ref_card').hide();
                $('.ref_bank').hide();
                $('.ref_mobile').show();
                $('.ref_transaction').show();
            }
            else {
                $('.ref_cash').hide();
                $('.ref_card').hide();
                $('.ref_bank').hide();
                $('.ref_mobile').hide();
                $('.ref_transaction').hide();
            }
        });

    </script>
@endsection
