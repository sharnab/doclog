@extends('layouts.admin')
@section('extra_css')

<style type="text/css" media="print">
@page {
    size: auto;   /* auto is the initial value */
    margin: 0;  /* this affects the margin in the printer settings */
}
</style>

<style type="text/css">
    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }

    table, tr, td{
        padding: 5px;
    }

    #invoice td, #invoice th {
      padding: 8px;
    }

    #invoice tr:nth-child(odd){background-color: #f2f2f2;}

    #invoice tr:hover {background-color: #ddd;}

    #invoice th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }


    #main_table th {
        text-align: center;
    }

    #invoice, #total {
        border: 1px solid #f2f2f2;
    }

    .page-content, .page-container{
        background-color: white;
    }

    #total td, #total th {
      padding: 8px;
    }

    #total tr:nth-child(odd){background-color: #f2f2f2;}

    #total tr:hover {background-color: #ddd;}

    #total th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #4CAF50;
      color: white;
    }

    .different{
        background-color: #cacaca;
    }
</style>
@endsection

@section('content')
{{--    <link href="/assets/global/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet">--}}
    <!-- BEGIN PAGE HEAD -->
    <div class="page-head">
        <!-- BEGIN PAGE TITLE -->
        <div class="page-title">
            <h1>Invoice</h1>
        </div>
        <!-- END PAGE TITLE -->

    <!-- END PAGE HEAD -->
    </div>
    <!-- END PAGE HEAD -->
    <!-- BEGIN PAGE BREADCRUMB -->
    <ul class="page-breadcrumb breadcrumb">
        <li>&nbsp;</li>
    </ul>
    <!-- END PAGE BREADCRUMB -->
    <!-- BEGIN PAGE CONTENT-->
    <!-- BEGIN PAGE CONTENT-->
    <div class="page-content-wrapper">
        <div class="invoice">
            {!! Form::open(['route' => 'invoice_store']) !!}
            <div class="row invoice-logo">
                <div class="col-xs-6 invoice-logo-space">
                    <img src="../../template/metronic/assets/admin/layout4/img/logo-ams.png" class="img-responsive" alt="company logo" style="height:100px"/>
                    <p style="margin: 10px 0 0">
                        Graps Travels Ltd.
                    </p>
                    <p style="margin: 0">
                        Graps Market, Plot-8, Madani Avenue, Block-J, Baridhara, Dhaka-1212
                    </p>
                    <p style="margin: 0">
                        <b>Email:</b>office@graspbd.com <b>Phone:</b> +88 01733 380 500
                    </p>
                    <p>
                        <b>Website:</b>www.graspbd.com
                    </p>
                </div>
                <div class="col-md-6 from right">
                    <h4 class="different text-center" style="padding: 10px; width: 90%">Invoice Info</h4>
                    <input type="hidden" name="booking_id" value="{{ $item->id }}">
                    <div class="form-group required">
                        <label class="col-md-4 control-label required">Invoice Date</label>
                        <div class="col-md-7 {{ $errors->has('invoice_date') ? 'has-error' : '' }}">
                            <div class="input-icon">
                                <i class="fa fa-calendar "></i>
                                <input type="text" class="form-control datepicker" name="invoice_date" value="{{ empty(old('invoice_date'))?date('d-m-Y'):old('invoice_date') }}" placeholder="dd-mm-yyyy" >
                                @if ($errors->has('invoice_date'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('invoice_date') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="clearfix" style="margin-bottom: 15px"></div>

                    <div class="form-group required">
                        <label class="col-md-4 control-label required">Due Date</label>
                        <div class="col-md-7 {{ $errors->has('due_date') ? 'has-error' : '' }}">
                            <div class="input-icon">
                                <i class="fa fa-calendar "></i>
                                <input type="text" class="form-control datepicker" name="due_date" value="{{  empty(old('due_date'))?date('d-m-Y'):old('due_date')  }}" placeholder="dd-mm-yyyy" >
                                @if ($errors->has('due_date'))
                                    <span class="help-block">
                                            <strong>{{ $errors->first('due_date') }}</strong>
                                        </span>
                                @endif
                            </div>
                        </div>
                    </div>


{{--                    <table id="invoice" style="width:90%">--}}
{{--                        <tr class="different">--}}
{{--                            <td colspan="3" style="text-align: center;" class="different">--}}
{{--                                INVOICE INFO--}}
{{--                            </td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>No.</td>--}}
{{--                            <td>:</td>--}}
{{--                            <td style="text-align: right">INVOICE</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Date</td>--}}
{{--                            <td>:</td>--}}
{{--                            <td style="text-align: right">INVOICE</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>Customer ID</td>--}}
{{--                            <td>:</td>--}}
{{--                            <td style="text-align: right">INVOICE</td>--}}
{{--                        </tr>--}}
{{--                        <tr>--}}
{{--                            <td>PNR</td>--}}
{{--                            <td>:</td>--}}
{{--                            <td style="text-align: right">INVOICE</td>--}}
{{--                        </tr>--}}
{{--                    </table>--}}
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-xs-8">
                    <h4>To:</h4>
                    <ul class="list-unstyled">
                        <li>
                           <strong style="font-weight: bold ">Name: </strong>   {{$item->passenger->given_name}}
                        </li>
                        <li>
                            <strong style="font-weight: bold ">Contact: </strong>   {{$item->passenger->contact_no}}
                        </li>
                        <li>
                            {{ $item->passenger->billing_address }}
                        </li>
                        <li>
                            <strong style="font-weight: bold ">Email: </strong>  {{ $item->passenger->email }} <strong style="font-weight: bold ">Phone: </strong>  {{ $item->passenger->personal_no }}
                        </li>
                    </ul>
                </div>

                <div class="col-xs-4 invoice-payment">
                    <h4>Invoice For:</h4>
                    <ul class="list-unstyled">
                        <li>
                            <strong style="text-transform: uppercase; font-weight: bold ">{{ $item->customer->given_name }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table id="main_table" class="table table-striped table-hover">
                    <thead>
                    <tr class="different">
                        <th>
                             Name Of Pax(s)
                        </th>
                        <th class="hidden-480">
                            Ticket No.
                        </th>
                        <th class="hidden-480">
                             Particulars
                        </th>
                        <th class="hidden-480">
                             BDT Fare
                        </th>
                        <th>
                             Tax
                        </th>
                        <th>
                            Amount in BDT
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            {{$item->passenger->given_name}}
                        </td>
                        <td>
                             {{$item->ticket_number}}
                        </td>
                        <td class="hidden-480">
                            {{$item->sector->name}}
                        </td>
                        <td class="hidden-480" style="text-align: center">
                            {{$item->base_fare}}
                        </td>
                        <td class="hidden-480" style="text-align: center">
                            {{$item->tax}}
                        </td>
                        <td style="text-align: center">
                            {{$item->base_fare + $item->tax }}
                        </td>
                    </tr>

                    </tbody>
                    </table>
                </div>
            </div>
            <hr  style="border: 1px solid gray">
            <div class="row">
                <div class="col-xs-8">
                    <div class="well">
                        <p><strong style="text-transform: uppercase; font-weight: bold ">In Words:  {{ convertNumberToWord( $item->payable_amount) }} Taka</strong ></p>
                        <p>
                        <p><strong style="font-weight: bold ">Note: </strong><br />
                            All payment should be made in favor of "Grasp Travel Services Ltd."<br />
                            This Invoice will not be recognized as paid unless supported by Company Official Receipt.<br />
                            3% Bank Change will be add on total bill amount, if the bill Paid/settled by Debit/Credit Card
                        </p>
                    </div>
                </div>
                <div class="col-xs-4">
                    <table id="total" style="width:80%">
                        <tr style="background-color: white">
                            <td>Total Fare</td>
                            <td>:</td>
                            <td style="text-align: right">{{$item->base_fare}}</td>
                        </tr>

                        @if($item->discount_amount!=0 )
                            <tr style="background-color: white">
                                <td>Discount</td>
                                <td>:</td>
                                <td style="text-align: right"> {{$item->discount_amount}}</td>
                            </tr>
                        @endif
                        <tr style="background-color: white">
                            <td>Total Tax</td>
                            <td>:</td>
                            <td style="text-align: right"> {{$item->tax}}</td>
                        </tr>
                        <tr >
                            <td>VAT & AIT</td>
                            <td>:</td>
                            <td style="text-align: right">{{$item->vat + $item->ait}}</td>
                        </tr>



                        <tr class="different" style="background-color: white">
                            <td>Total</td>
                            <td>:</td>
                            <td style="text-align: right">BDT {{$item->payable_amount}}</td>
                        </tr>
                        <input type="hidden" name="invoice_amount" value="{{$item->payable_amount}}">
                    </table>
                </div>

            </div>



            <div class="row">
                <div class="form-actions">
                    <div class="row">
                        <div class="col-md-offset-3 col-md-6">
                            <button type="submit" class="btn green" >Submit</button>
                            <button type="reset" class="btn red">Reset</button>
                        </div>
                    </div>
                </div>
            </div>

            {{ Form::close() }}
        </div>
    </div>
    <!-- END PAGE CONTENT-->

@endsection
@section('scripts')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
        dateFormat: 'dd-mm-yy',
        autoclose: true
    });
</script>
@endsection
