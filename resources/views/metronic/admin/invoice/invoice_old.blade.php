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
            <div class="row invoice-logo">
                <div class="col-xs-8 invoice-logo-space">
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
                <div class="col-xs-4">
                    <table id="invoice" style="width:90%">
                        <tr class="different">
                            <td colspan="3" style="text-align: center;" class="different">
                                INVOICE
                            </td>
                        </tr>
                        <tr>
                            <td>No.</td>
                            <td>:</td>
                            <td style="text-align: right">INVOICE</td>
                        </tr>
                        <tr>
                            <td>Date</td>
                            <td>:</td>
                            <td style="text-align: right">INVOICE</td>
                        </tr>
                        <tr>
                            <td>Customer ID</td>
                            <td>:</td>
                            <td style="text-align: right">INVOICE</td>
                        </tr>
                        <tr>
                            <td>PNR</td>
                            <td>:</td>
                            <td style="text-align: right">INVOICE</td>
                        </tr>
                    </table>
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-xs-8">
                    <h4>To:</h4>
                    <ul class="list-unstyled">
                        <li>
                             grasp REAL ESTATE
                        </li>
                        <li>
                             Contact:Samuel
                        </li>
                        <li>
                            Grasp Merket, plot 8, madani avenue, block-j, Baridhara, Nutan Bazar,Dhaka 1212
                        </li>
                        <li>
                             Email: samuel@graspbd.com Phone: 01777750957
                        </li>
                    </ul>
                </div>

                <div class="col-xs-4 invoice-payment">
                    <h4>Invoice For:</h4>
                    <ul class="list-unstyled">
                        <li>
                            <strong>BIKASH MANDAL/MR</strong>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <table class="table table-striped table-hover">
                    <thead>
                    <tr class="different">
                        <th>
                             #
                        </th>
                        <th>
                             Item
                        </th>
                        <th class="hidden-480">
                             Description
                        </th>
                        <th class="hidden-480">
                             Quantity
                        </th>
                        <th class="hidden-480">
                             Unit Cost
                        </th>
                        <th>
                             Total
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                             1
                        </td>
                        <td>
                             Hardware
                        </td>
                        <td class="hidden-480">
                             Server hardware purchase
                        </td>
                        <td class="hidden-480">
                             32
                        </td>
                        <td class="hidden-480">
                             $75
                        </td>
                        <td>
                             $2152
                        </td>
                    </tr>
                    <tr>
                        <td>
                             2
                        </td>
                        <td>
                             Furniture
                        </td>
                        <td class="hidden-480">
                             Office furniture purchase
                        </td>
                        <td class="hidden-480">
                             15
                        </td>
                        <td class="hidden-480">
                             $169
                        </td>
                        <td>
                             $4169
                        </td>
                    </tr>
                    <tr>
                        <td>
                             3
                        </td>
                        <td>
                             Foods
                        </td>
                        <td class="hidden-480">
                             Company Anual Dinner Catering
                        </td>
                        <td class="hidden-480">
                             69
                        </td>
                        <td class="hidden-480">
                             $49
                        </td>
                        <td>
                             $1260
                        </td>
                    </tr>
                    <tr>
                        <td>
                             3
                        </td>
                        <td>
                             Software
                        </td>
                        <td class="hidden-480">
                             Payment for Jan 2013
                        </td>
                        <td class="hidden-480">
                             149
                        </td>
                        <td class="hidden-480">
                             $12
                        </td>
                        <td>
                             $866
                        </td>
                    </tr>
                    </tbody>
                    </table>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-8">
                    <div class="well">
                        <p>In words: three thousand and forty-five and sixty-nine</p>
                        <p>
                            Note:<br />
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
                            <td style="text-align: right">3045.69</td>
                        </tr>
                        <tr style="background-color: white">
                            <td>Total Tax</td>
                            <td>:</td>
                            <td style="text-align: right">283.36</td>
                        </tr>
                        <tr class="different">
                            <td>VAT & AIT</td>
                            <td>:</td>
                            <td style="text-align: right">0.00</td>
                        </tr>
                        <tr style="background-color: white">
                            <td>&nbsp;</td>
                            <td>:</td>
                            <td style="text-align: right">BDT 3045.69</td>
                        </tr>
                    </table>
                </div>

            </div>
            <div class="row">
                <div class="col-xs-12 invoice-block text-center">
                    <a class="btn btn-lg blue hidden-print margin-bottom-5" onclick="javascript:window.print();">
                    Print <i class="fa fa-print"></i>
                    </a>
                    <a class="btn btn-lg green hidden-print margin-bottom-5">
                    Submit Your Invoice <i class="fa fa-check"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- END PAGE CONTENT-->

@endsection
@section('scripts')

<script type="text/javascript">

</script>
@endsection
