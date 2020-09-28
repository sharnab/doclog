@extends('layouts.admin')
@section('extra_css')

<style type="text/css">

    @media print {

       #print_area {
         display: : none;
       }
    }



    .table {
        display: table;
        border-spacing: 2px;
    }

    .row {
        display: table-row;
    }

    .row>div {
        display: table-cell;
        border: solid 1px #ccc;
        padding: 2px;
    }

    div.checker {
        margin-top: 2px;
        margin-left: -2px;
    }

    .end-padding {
        padding-right: 10px !important;
    }

    .left-cell {
        width: 25% !important;
    }

    .right-cell {
        width: 25% !important;
    }

</style>
@endsection

@section('content')

<!--begin::Entry-->
<div class="d-flex flex-column-fluid" id="print_area">
    <!--begin::Container-->
    <div class="container">
        <!-- begin::Card-->
        <div class="card card-custom overflow-hidden">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-8 px-6 py-md-2 px-md-0">
                    <div class="col-md-12">
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row py-md-5" style="padding-bottom: 0 !important; height: 50px;">
                            <span class="opacity-100" style="text-align: center; padding-right: 8%">
                                <img src="{{url('/img/govt_seal.png')}}" style="width: 5%; text-align: center" />
                            </span>
                        </div>
                        <div class="d-flex justify-content-between pb-10 pb-md-2 py-md-10 flex-column flex-md-row" style="padding-bottom: 0 !important; height: 80px">
                            <h1 class="display-6 font-weight-bold mb-6 col-md-10" style="text-align: center; margin-bottom: 0 !important; padding-left: 15%">Government of the People's Republic of Bangladesh</h1>
                            <div class=" col-md-2">
                                <!--begin::Logo-->
                                <span class="d-flex flex-column align-items-md-center opacity-80">
                                    <img src="{{url('/uploads/demo-user.png')}}" style="width: 70%; text-align: center" />
                                </span>
                                <!--end::Logo-->
                            </div>
                        </div>
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row" style="padding-bottom: 0 !important;">
                            <h3 class="display-8 font-weight-bold mb-6 col-md-10" style="text-align: center; padding-left: 15%; margin-bottom: 5px !important">Bureau of Manpower, Employment and Training (BMET)</h3>
                        </div>
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row" style="padding-bottom: 0 !important;">
                            <h8 class="display-8 mb-6 col-md-10" style="text-align: center; padding-left: 12%">
                                Website: www.bmet.org.bd, e-mail: registration
                                @bmet.org.bd
                            </h8>
                        </div>
                        <div class="d-flex justify-content-between pb-10 pb-md-20 flex-column flex-md-row" style="padding-bottom: 0 !important;">
                            <h3 class="display-8 font-weight-bold mb-6 col-md-10" style="text-align: center; padding-left: 15%; margin-bottom: 5px !important; padding-top: 5px !important">JOB SEEKER'S REGISTRATION FORM</h3>
                        </div>
                        <div class="row justify-content-center py-8 px-8 py-md-5 px-md-0">
                            <div class="col-md-11">
                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Personal Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4" style="width: 25%">Passport Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">Issue Place</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Issue Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Expiry Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4"></td>
                                                <td class="border-top-0 py-4"></td>
                                                <td class="border-top-0 py-4 pr-10" colspan="2"></td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4" colspan="2"></td>
                                                <td class="border-top-0 py-4" colspan="2">(First name)</td>
                                                <td class="border-top-0 py-4 pr-10" colspan="2">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Father's Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Mother's Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Marital Status</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class="border-top-0 py-4">Spouse's Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(First name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 py-4 pl-10">National ID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                                <td class=" border-top-0 py-4">Nationality</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4 pr-10">(First name)</td>

                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Date of Birth</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Birth Place</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 py-4 pl-10">Sex</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                                <td class=" border-top-0 py-4">Religion</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 py-4 pl-10">Email Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">LineID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Facebook ID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Whatapp ID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">LinkedIn ID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Visa & Arrival Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4" style="width: 25%">Arrival Country</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4" style='width: 26%'>(First name)</td>
                                                <td class="border-top-0 py-4" style="width: 25%">Entry Date</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4">Airport IATA Code</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class="border-top-0 py-4">Immigration Endorsement Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Visa Type</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Entry</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Issue Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Expiry Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- page break for printing --}}
                                <P style="page-break-before: always">

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Employee Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4" style="width: 25%">BMET Smart Card Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">Category Of Workers</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Memo No</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Issue Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Permit Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Type Of Worker</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan="4">(First name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Mother Company Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4" style="width: 25%">Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">Business Type</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan="4">(First name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Supplier Company Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4" style="width: 25%">Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">Business Type</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan="4">(First name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Recruiting Agency Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4" style="width: 25%">Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">RL No</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan="4">(First name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Financial Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4" style="width: 25%">Salary/Wages</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">Currency</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Bank Account In Current Country</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4" style="width: 25%">Account Name</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class="border-top-0 py-4" style="width: 25%">Account Number</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Bank Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Branch Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Routing Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">SWIFT</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- page break for printing --}}
                                <P style="page-break-before: always">

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Information About Bank Account In Bangladesh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4" style="width: 25%">Account Name</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class="border-top-0 py-4" style="width: 25%">Account Number</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Bank Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Branch Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Routing Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">SWIFT</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">(Last name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Address In Current Country</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4" style="width: 25%">Flat Number</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class="border-top-0 py-4" style="width: 25%">Holding/House Number</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Street</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan='3'>(First name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Area</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Post Code</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">City</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Country</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Emergency Contact In Current Country</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4" style="width: 25%">Name</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">(First name)</td>
                                                <td class="border-top-0 py-4" style="width: 25%">Relationship</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(First name)</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan='4'>(First name)</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Adresses In Bangladesh</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td colspan="3">
                                                    <table class="table" style="border: 0px solid #ECF0F3; padding: 5px">
                                                        <thead>
                                                            <tr>
                                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Mailing Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="font-weight-bold">
                                                                <td class="border-top-0 pl-10 py-4" style="width: 50%">Street/Para</td>
                                                                <td class="border-top-0 pl-0">:</td>
                                                                <td class="border-top-0 py-4" style="width: 60%">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Division</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">District</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Thana/Upazila</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Word/Union</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Area/Village</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Post Office</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Email</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Contact Number</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                                <td colspan="3">
                                                    <table class="table" style="border: 0px solid #ECF0F3; padding: 5px">
                                                        <thead>
                                                            <tr>
                                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Permanent Address</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr class="font-weight-bold">
                                                                <td class="border-top-0 pl-10 py-4" style="width: 58%">Street/Para</td>
                                                                <td class="border-top-0 pl-0">:</td>
                                                                <td class="border-top-0 py-4" style="width: 60%">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Division</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">District</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Thana/Upazila</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Word/Union</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Area/Village</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Post Office</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Email</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Contact Number</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">(First name)</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice header-->
                <!-- begin: Invoice body-->

                <!-- end: Invoice body-->
                <!-- begin: Invoice footer-->
                <div class="row justify-content-left py-8 px-8 py-md-0 px-md-15">
                    <div class="col-md-12">
                        <div class="table-responsive">
                            <table class="table" style="border: 0px">
                                <tbody>
                                    <tr class="font-weight-bolder">
                                        <td style="border: 0px" colspan="2">
                                            I hereby declare that the above written particulars are true to the best of my knowledge and belief. I am conscious of the legal
                                            consequences due to false declarations, formation or use of fake documents.
                                        </td>
                                    </tr>
                                    <tr class="font-weight-bolder">
                                        <td style="border: 0px; padding-top: 8rem" colspan="2"></td>
                                    </tr>
                                    <tr class="font-weight-bolder">
                                        <td style="border: 0px; text-align: center">
                                            Signature of DEMO Official
                                        </td>
                                        <td style="border: 0px; text-align: center">
                                            Applicant's Signature
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end: Invoice footer-->
                <!-- begin: Invoice action-->
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0 noprint">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
                            <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download Invoice</button>
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print Invoice</button>

                        </div>
                    </div>
                </div>
                <!-- end: Invoice action-->
                <!-- end: Invoice-->
            </div>
        </div>
        <!-- end::Card-->
    </div>
    <!--end::Container-->
</div>
<!--end::Entry-->


@endsection
@section('scripts')

<script type="text/javascript">

</script>
@endsection
