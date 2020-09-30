@extends('layouts.admin')
@section('extra_css')

<style type="text/css">
   @page {
       margin-top:0px;
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
<div class="d-flex flex-column-fluid " style="margin-top: 0px;padding-top: 0px" >
    <!--begin::Container-->
    <div class="container">
        <!-- begin::Card-->
        <div class="card card-custom overflow-hidden">
            <div class="card-body p-0">
                <!-- begin: Invoice-->
                <!-- begin: Invoice header-->
                <div class="row justify-content-center py-8 px-6 py-md-2 px-md-0">
                    <div class="col-md-12">
                        <div class="row justify-content-center py-8 px-8 py-md-5 px-md-0">
                            <div class="col-md-11">
                                <div class="table-responsive">
                                    <table class="table" style="border: 0px solid #ECF0F3; padding: 5px">
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4 col-md-6" style="text-align: center; padding-left: 20% !important"><img src="{{url('/img/govt_seal.png')}}" style="width: 15%; text-align: center;" /></td>
                                                <td class="border-top-0 pl-10 py-4 col-md-4"></td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-0 col-md-6" style="text-align: center;"><h2 class="display-6 font-weight-bold mb-6" style="text-align: center; margin-bottom: 0 !important; padding-left: 20%">Government of the People's Republic of Bangladesh</h2></td>
                                                <td class="border-top-0 pl-10 py-0 col-md-4" rowspan="4"><img src="{{empty($item['image'])?asset('/img/demo_user.png'):asset($item['image'])}}" style="width: 140px; text-align: left" /></td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-42 py-0 col-md-6" style="text-align: center; padding-left: 20%;"><h3 class="display-8 font-weight-bold mb-6" style="text-align: center; margin-bottom: 5px !important">Embassy of Bangladesh</h3></td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-42 py-0 col-md-6" style="text-align: center; padding-left: 20%;"><h4 class="display-8 font-weight-bold mb-6" style="text-align: center; margin-bottom: 5px !important">Bangkok, Thailand</h4></td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-42 py-0 col-md-6" style="text-align: center; padding-left: 23%;"><h8 class="display-8 mb-6" style="text-align: center;">www.bdembassybangkok.org, mission.bangkok@mofa.gov.bd</h8></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
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
                                                <td class="border-top-0 py-4" style="width: 26%">{{$item['passport_number']}}</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">Issue Place</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$item['passport_issue_place']}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Issue Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{$item['passport_issue_date']}}</td>
                                                <td class=" border-top-0 py-4">Expiry Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$item['passport_expiry_date']}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{$item['first_name']}}</td>
                                                <td class="border-top-0 py-4"></td>
                                                <td class="border-top-0 py-4 pr-10" colspan="2">{{$item['last_name']}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4" colspan="2"></td>
                                                <td class="border-top-0 py-4" colspan="2">(First name)</td>
                                                <td class="border-top-0 py-4 pr-10" colspan="2">(Last name)</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Father's Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{$item['father_name']}}</td>
                                                <td class=" border-top-0 py-4">Mother's Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{$item['mother_name']}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Marital Status</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{$item['marital_status']}}</td>
                                                <td class="border-top-0 py-4">Spouse's Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$item['spouse_name']}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 py-4 pl-10">National ID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{$item['nid']}}</td>
                                                <td class=" border-top-0 py-4">Nationality</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$country_list[$item['nationality']]}}</td>

                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Date of Birth</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{ !empty($item['date_of_birth'])?date('d-m-Y',strtotime($item['date_of_birth'])):null}}</td>
                                                <td class=" border-top-0 py-4">Birth Place</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$country_list[$item['birth_country_id']]}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 py-4 pl-10">Sex</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$item['gender']}}</td>
                                                <td class=" border-top-0 py-4">Religion</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{(isset($item['religion']['title']))? $item['religion']['title']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 py-4 pl-10">Email Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$item['email']}}</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$item['mobile']}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">LineID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{$item['line_id']}}</td>
                                                <td class=" border-top-0 py-4">Facebook ID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$item['facebook_id']}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Whatapp ID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{$item['whatsapp_id']}}</td>
                                                <td class=" border-top-0 py-4">LinkedIn ID</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{$item['linkedin_id']}}</td>
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
                                                <td class="border-top-0 py-4" style='width: 26%'>{{(isset($item['arrival']['arrival_country_id'])&&($item['arrival']['arrival_country_id']>0))? $country_list[$item['arrival']['arrival_country_id']]:''}}</td>
                                                <td class="border-top-0 py-4" style="width: 25%">Entry Date</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4">{{isset($item['arrival']['date'])?((!empty($item['arrival']['date']) && is_null($item['arrival']['date']))?date('d-m-Y',strtotime($item['arrival']['date'])):''):''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class="border-top-0 pl-10 py-4">Airport IATA Code</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['arrival']['iata_code']))? $item['arrival']['iata_code']:''}}</td>
                                                <td class="border-top-0 py-4">Immigration Endorsement Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{ isset($item['arrival']['immigration_endorsement_date'])?((!empty($item['arrival']['immigration_endorsement_date']) && is_null($item['arrival']['immigration_endorsement_date']))?date('d-m-Y',strtotime($item['arrival']['immigration_endorsement_date'])):''):''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Visa Type</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['visa']['visa_type']))? $item['visa']['visa_type']:''}}</td>
                                                <td class=" border-top-0 py-4">Entry</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{(isset($item['visa']['entry_type']))? $item['visa']['entry_type']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Issue Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{isset($item['visa']['issue_date'])?((!empty($item['visa']['issue_date']) && is_null($item['visa']['issue_date']))?date('d-m-Y',strtotime($item['visa']['issue_date'])):''):''}}</td>
                                                <td class=" border-top-0 py-4">Expiry Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{isset($item['visa']['expiry_date'])?((!empty($item['visa']['expiry_date']) && is_null($item['visa']['expiry_date']))?date('d-m-Y',strtotime($item['visa']['expiry_date'])):''):''}}</td>

                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                <div style="page-break-before: always; width: 100%; height: 60px;"></div>

                                <div class="table-responsive" >
                                    <table class="table" style="border: 1px solid #ECF0F3; padding: 5px">
                                        <thead>
                                            <tr>
                                                <th class="pl-10 font-weight-boldest text-muted py-4" colspan="6" style="font-size: 18px">Employment Information</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4" style="width: 25%">BMET Smart Card Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" style="width: 26%">{{(isset($item['bmet']['bmet_number']))? $item['bmet']['bmet_number']:''}}</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">Category Of Workers</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['employment_type']['worker_category_id']))? $item['employment_type']['worker_category_id']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Ministry Approval Memo No</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['ministry_approval']['memo_number']))? $item['ministry_approval']['memo_number']:''}}</td>
                                                <td class=" border-top-0 py-4">Ministry Approval Date</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{isset($item['ministry_approval']['issue_date'])?((!empty($item['ministry_approval']['issue_date']) && is_null($item['ministry_approval']['issue_date']))?date('d-m-Y',strtotime($item['ministry_approval']['issue_date'])):''):''}}</td>
                                               
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Work Permit Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['work_permit']['permit_number']))? $item['work_permit']['permit_number']:''}}</td>
                                                <td class=" border-top-0 py-4">Type Of Worker</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{(isset($item['employment_type']['worker_type_id']))? $item['employment_type']['worker_type_id']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Work Place Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['work_place']['email']))? $item['work_place']['email']:''}}</td>
                                                <td class=" border-top-0 py-4">Work Place Contact</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{(isset($item['work_place']['mobile']))? $item['work_place']['mobile']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Work Place Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan="4">{{(isset($item['work_place']['address']))? $item['work_place']['address']:''}}</td>
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
                                                <td class="border-top-0 py-4" style="width: 26%">{{(isset($item['mother_company']['name']))? $item['mother_company']['name']:''}}</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">Business Type</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['mother_company']['business_type']))? $item['mother_company']['business_type']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['mother_company']['email']))? $item['mother_company']['email']:''}}</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{(isset($item['mother_company']['mobile']))? $item['mother_company']['mobile']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan="4">{{(isset($item['mother_company']['address']))? $item['mother_company']['address']:''}}</td>
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
                                            <td class="border-top-0 py-4" style="width: 26%">{{(isset($item['supplier_company']['name']))? $item['supplier_company']['name']:''}}</td>
                                            <td class=" border-top-0 py-4" style="width: 25%">Business Type</td>
                                            <td class="border-top-0 pl-0 ">:</td>
                                            <td class="border-top-0 py-4">{{(isset($item['supplier_company']['business_type']))? $item['supplier_company']['business_type']:''}}</td>
                                        </tr>
                                        <tr class="font-weight-bold">
                                            <td class=" border-top-0 pl-10 py-4 ">Email</td>
                                            <td class="border-top-0 pl-0 ">:</td>
                                            <td class="border-top-0 py-4">{{(isset($item['supplier_company']['email']))? $item['supplier_company']['email']:''}}</td>
                                            <td class=" border-top-0 py-4">Contact Number</td>
                                            <td class="border-top-0 pl-0 ">:</td>
                                            <td class="border-top-0 py-4 pr-10">{{(isset($item['supplier_company']['mobile']))? $item['supplier_company']['mobile']:''}}</td>
                                        </tr>
                                        <tr class="font-weight-bold">
                                            <td class=" border-top-0 pl-10 py-4 ">Address</td>
                                            <td class="border-top-0 pl-0 ">:</td>
                                            <td class="border-top-0 py-4" colspan="4">{{(isset($item['supplier_company']['address']))? $item['supplier_company']['address']:''}}</td>
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
                                                <td class="border-top-0 py-4" style="width: 26%">{{(isset($item['recruiting_agency']['name']))? $item['recruiting_agency']['name']:''}}</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">RL No</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['recruiting_agency']['rl_number']))? $item['recruiting_agency']['rl_number']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['recruiting_agency']['email']))? $item['recruiting_agency']['email']:''}}</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{(isset($item['recruiting_agency']['mobile']))? $item['recruiting_agency']['mobile']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan="4">{{(isset($item['recruiting_agency']['address']))? $item['recruiting_agency']['address']:''}}</td>
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
                                                <td class="border-top-0 py-4" style="width: 26%">{{(isset($item['salary_info']['amount']))? $item['salary_info']['amount']:''}}</td>
                                                <td class=" border-top-0 py-4" style="width: 25%">Currency</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['salary_info']['currency_id']))? $item['salary_info']['currency_id']:''}}</td>
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
                                                <td class="border-top-0 py-4" style="width: 26%">{{(isset($item['current_country_bank_account']['account_name']))? $item['current_country_bank_account']['account_name']:''}}</td>
                                                <td class="border-top-0 py-4" style="width: 25%">Account Number</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{(isset($item['current_country_bank_account']['account_number']))? $item['current_country_bank_account']['account_number']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Bank Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_bank_account']['bank_name']))? $item['current_country_bank_account']['bank_name']:''}}</td>
                                                <td class=" border-top-0 py-4">Branch Name</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{(isset($item['current_country_bank_account']['branch_name']))? $item['current_country_bank_account']['branch_name']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4 ">Routing Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_bank_account']['routing_number']))? $item['current_country_bank_account']['routing_number']:''}}</td>
                                                <td class=" border-top-0 py-4">SWIFT</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4 pr-10">{{(isset($item['current_country_bank_account']['swift']))? $item['current_country_bank_account']['swift']:''}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                                {{-- page break for printing --}}
                                <div style="page-break-before: always; width: 100%; height: 60px;"></div>

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
                                            <td class="border-top-0 py-4" style="width: 26%">{{(isset($item['bd_bank_account']['account_name']))? $item['bd_bank_account']['account_name']:''}}</td>
                                            <td class="border-top-0 py-4" style="width: 25%">Account Number</td>
                                            <td class="border-top-0 pl-0">:</td>
                                            <td class="border-top-0 py-4 pr-10">{{(isset($item['bd_bank_account']['account_number']))? $item['bd_bank_account']['account_number']:''}}</td>
                                        </tr>
                                        <tr class="font-weight-bold">
                                            <td class=" border-top-0 pl-10 py-4 ">Bank Name</td>
                                            <td class="border-top-0 pl-0 ">:</td>
                                            <td class="border-top-0 py-4">{{(isset($item['bd_bank_account']['bank_name']))? $item['bd_bank_account']['bank_name']:''}}</td>
                                            <td class=" border-top-0 py-4">Branch Name</td>
                                            <td class="border-top-0 pl-0 ">:</td>
                                            <td class="border-top-0 py-4 pr-10">{{(isset($item['bd_bank_account']['branch_name']))? $item['bd_bank_account']['branch_name']:''}}</td>
                                        </tr>
                                        <tr class="font-weight-bold">
                                            <td class=" border-top-0 pl-10 py-4 ">Routing Number</td>
                                            <td class="border-top-0 pl-0 ">:</td>
                                            <td class="border-top-0 py-4">{{(isset($item['bd_bank_account']['routing_number']))? $item['bd_bank_account']['routing_number']:''}}</td>
                                            <td class=" border-top-0 py-4">SWIFT</td>
                                            <td class="border-top-0 pl-0 ">:</td>
                                            <td class="border-top-0 py-4 pr-10">{{(isset($item['bd_bank_account']['swift']))? $item['bd_bank_account']['swift']:''}}</td>
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
                                                <td class="border-top-0 py-4" style="width: 26%">{{(isset($item['current_country_address']['flat_number']))? $item['current_country_address']['flat_number']:''}}</td>
                                                <td class="border-top-0 py-4" style="width: 25%">Holding/House Number</td>
                                                <td class="border-top-0 pl-0">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_address']['holding_number']))? $item['current_country_address']['holding_number']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Street</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan='3'>{{(isset($item['current_country_address']['street']))? $item['current_country_address']['street']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Area</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_address']['area']))? $item['current_country_address']['area']:''}}</td>
                                                <td class=" border-top-0 py-4">Post Code</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_address']['post_code']))? $item['current_country_address']['post_code']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">City</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_address']['city']))? $item['current_country_address']['city']:''}}</td>
                                                <td class=" border-top-0 py-4">Country</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_address']['country_id']))? $item['current_country_address']['country_id']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_address']['email']))? $item['current_country_address']['email']:''}}</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_address']['mobile']))? $item['current_country_address']['mobile']:''}}</td>
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
                                                <td class="border-top-0 py-4" style="width: 26%">{{(isset($item['current_country_emergency']['name']))? $item['current_country_emergency']['name']:''}}</td>
                                                <td class="border-top-0 py-4" style="width: 25%">Relationship</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_emergency']['relation']))? $item['current_country_emergency']['relation']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Email</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_emergency']['email']))? $item['current_country_emergency']['email']:''}}</td>
                                                <td class=" border-top-0 py-4">Contact Number</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4">{{(isset($item['current_country_emergency']['mobile']))? $item['current_country_emergency']['mobile']:''}}</td>
                                            </tr>
                                            <tr class="font-weight-bold">
                                                <td class=" border-top-0 pl-10 py-4">Address</td>
                                                <td class="border-top-0 pl-0 ">:</td>
                                                <td class="border-top-0 py-4" colspan='4'>{{(isset($item['current_country_emergency']['address']))? $item['current_country_emergency']['address']:''}}</td>
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
                                                                <td class="border-top-0 py-4" style="width: 60%">{{(isset($item['bdPresentAddress']['street']))? $item['bdPresentAddress']['street']:''}}</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Division</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">{{(isset($item['bdPresentAddress']['division']['title']))? $item['bdPresentAddress']['division']['title_en']:''}}</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">District</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">{{(isset($item['bdPresentAddress']['district']['title']))? $item['bdPresentAddress']['district']['title_en']:''}}</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Thana/Upazila</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">{{(isset($item['bdPresentAddress']['upazila']['title']))? $item['bdPresentAddress']['upazila']['title_en']:''}}</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Word/Union</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">{{(isset($item['bdPresentAddress']['union']['title']))? $item['bdPresentAddress']['union']['title_en']:''}}</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Area/Village</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">{{(isset($item['bdPresentAddress']['area']))? $item['bdPresentAddress']['area']:''}}</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Post Office</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">{{(isset($item['bdPresentAddress']['post_office']))? $item['bdPresentAddress']['post_office']:''}}</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Email</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">{{(isset($item['bdPresentAddress']['email']))? $item['bdPresentAddress']['email']:''}}</td>
                                                            </tr>
                                                            <tr class="font-weight-bold">
                                                                <td class=" border-top-0 pl-10 py-4">Contact Number</td>
                                                                <td class="border-top-0 pl-0 ">:</td>
                                                                <td class="border-top-0 py-4">{{(isset($item['bdPresentAddress']['mobile']))? $item['bdPresentAddress']['mobile']:''}}</td>
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
                                                            <td class="border-top-0 pl-10 py-4" style="width: 50%">Street/Para</td>
                                                            <td class="border-top-0 pl-0">:</td>
                                                            <td class="border-top-0 py-4" style="width: 60%">{{(isset($item['bdPermanentAddress']['street']))? $item['bdPermanentAddress']['street']:''}}</td>
                                                        </tr>
                                                        <tr class="font-weight-bold">
                                                            <td class=" border-top-0 pl-10 py-4">Division</td>
                                                            <td class="border-top-0 pl-0 ">:</td>
                                                            <td class="border-top-0 py-4">{{(isset($item['bdPermanentAddress']['division']['title']))? $item['bdPermanentAddress']['division']['title_en']:''}}</td>
                                                        </tr>
                                                        <tr class="font-weight-bold">
                                                            <td class=" border-top-0 pl-10 py-4">District</td>
                                                            <td class="border-top-0 pl-0 ">:</td>
                                                            <td class="border-top-0 py-4">{{(isset($item['bdPermanentAddress']['district']['title']))? $item['bdPermanentAddress']['district']['title_en']:''}}</td>
                                                        </tr>
                                                        <tr class="font-weight-bold">
                                                            <td class=" border-top-0 pl-10 py-4">Thana/Upazila</td>
                                                            <td class="border-top-0 pl-0 ">:</td>
                                                            <td class="border-top-0 py-4">{{(isset($item['bdPermanentAddress']['upazila']['title']))? $item['bdPermanentAddress']['upazila']['title_en']:''}}</td>
                                                        </tr>
                                                        <tr class="font-weight-bold">
                                                            <td class=" border-top-0 pl-10 py-4">Word/Union</td>
                                                            <td class="border-top-0 pl-0 ">:</td>
                                                            <td class="border-top-0 py-4">{{(isset($item['bdPermanentAddress']['union']['title']))? $item['bdPermanentAddress']['union']['title_en']:''}}</td>
                                                        </tr>
                                                        <tr class="font-weight-bold">
                                                            <td class=" border-top-0 pl-10 py-4">Area/Village</td>
                                                            <td class="border-top-0 pl-0 ">:</td>
                                                            <td class="border-top-0 py-4">{{(isset($item['bdPermanentAddress']['area']))? $item['bdPermanentAddress']['area']:''}}</td>
                                                        </tr>
                                                        <tr class="font-weight-bold">
                                                            <td class=" border-top-0 pl-10 py-4">Post Office</td>
                                                            <td class="border-top-0 pl-0 ">:</td>
                                                            <td class="border-top-0 py-4">{{(isset($item['bdPermanentAddress']['post_office']))? $item['bdPermanentAddress']['post_office']:''}}</td>
                                                        </tr>
                                                        <tr class="font-weight-bold">
                                                            <td class=" border-top-0 pl-10 py-4">Email</td>
                                                            <td class="border-top-0 pl-0 ">:</td>
                                                            <td class="border-top-0 py-4">{{(isset($item['bdPermanentAddress']['email']))? $item['bdPermanentAddress']['email']:''}}</td>
                                                        </tr>
                                                        <tr class="font-weight-bold">
                                                            <td class=" border-top-0 pl-10 py-4">Contact Number</td>
                                                            <td class="border-top-0 pl-0 ">:</td>
                                                            <td class="border-top-0 py-4">{{(isset($item['bdPermanentAddress']['mobile']))? $item['bdPermanentAddress']['mobile']:''}}</td>
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
{{--                                    <tr class="font-weight-bolder">--}}
{{--                                        <td style="border: 0px" colspan="2">--}}
{{--                                            I hereby declare that the above written particulars are true to the best of my knowledge and belief. I am conscious of the legal--}}
{{--                                            consequences due to false declarations, formation or use of fake documents.--}}
{{--                                        </td>--}}
{{--                                    </tr>--}}
{{--                                    <tr class="font-weight-bolder">--}}
{{--                                        <td style="border: 0px; padding-top: 8rem" colspan="2"></td>--}}
{{--                                    </tr>--}}
                                    <tr class="font-weight-bolder">
                                        <td style="border: 0px; text-align: center">
                                            Signature of Official
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
                <div class="row justify-content-center py-8 px-8 py-md-10 px-md-0 d-print-none noprint">
                    <div class="col-md-9">
                        <div class="d-flex justify-content-between">
{{--                            <button type="button" class="btn btn-light-primary font-weight-bold" onclick="window.print();">Download</button>--}}
                            <button type="button" class="btn btn-primary font-weight-bold" onclick="window.print();">Print</button>

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
